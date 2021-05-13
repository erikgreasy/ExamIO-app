<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Answer;
use App\Models\Attendance;
use App\Models\PairAnswer;
use App\Models\SelectOption;
use Illuminate\Http\Request;
use App\Models\LeftPairOption;
use App\Models\RightPairOption;
use Illuminate\Support\Facades\Storage;
use PDF;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Exam $exam)
    {
        return view('attendances.index', [
            'exam'   => $exam
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $code = $request->exam_code;
        $exam = Exam::where('exam_code', $code)->first();

        if (!$exam) {
            return view('exams.notfound', ['error_message' => "Test so zadaným kódom nexistuje."]);
        } else if (!$exam->active) {
            return view('exams.notfound', ['error_message' => "Váš test ešte nebol spustený."]);
        }

        return view('attendances.create', [
            'exam'  => $exam
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Exam $exam, Request $request)
    {
        $data = $request->validate([
            'first_name'  => 'required|string',
            'last_name'     => 'required|string',
            'ais_id'        => 'required'
        ]);

        $data['exam_id'] = $exam->id;
        $data['started_at'] = now();
        $data['active'] = true;

        $attendance = Attendance::create($data);

        return view('exams.show', [
            'exam'  => $exam,
            'attendance'    => $attendance
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam, Attendance $attendance)
    {
        if ($attendance->active)
            return abort(404);

        $answers = Answer::where('attendance_id', $attendance->id)->get();
        
        $pairAnswer = [];
        foreach ($answers as $answer) {
            if ($answer->questionType->type_id == 3) {

                //$pairAnswer[] = $answers->pairAnswers;
                $pairAnswer[] = PairAnswer::where('answer_id', $answer->id)->get();
                //dd($answer->pairAnswers->first());
            }
        }

        return view('attendances.show', [
            'exam'          => $exam,
            'attendance'    => $attendance,
            'answers'       => $answers,
            'pairAnswer'    => $pairAnswer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //

    }

    public function correction( Answer $answer,Attendance $attendance)
    {
        Answer::where('id', $answer->id)->update(['is_correct' => !$answer->is_correct]);
        
        if(!$answer->is_correct){
            $attendance->points = ++$attendance->points;
        }
        else{
            $attendance->points = --$attendance->points;
        }
        
        $attendance->save();
        return back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam, Attendance $attendance)
    {
        $request->validate([
            'question_answer' => 'required',
        ]);

        Attendance::where('id', $attendance->id)->update(['active' => false]);
        // dd($request->all());
        
        $points = $attendance->points;

        foreach ($exam->questions as $index => $question) {
            $questionType = $question->questionType->full_name;
            $questionAnswer = $request->question_answer[$index];

            if ($questionType == "Krátka odpoveď") {
                $correctAnswer = Answer::where('question_id', $question->id)->where('attendance_id', NULL)->get()->first()->text;
                $is_correct = ($correctAnswer == $questionAnswer);
                if($is_correct) $points++;
                Answer::create([
                    'attendance_id'     => $attendance->id,
                    'question_id'       => $question->id,
                    'text'              => $questionAnswer,
                    'img_path'          => null,
                    'select_option_id'  => null,
                    'is_correct'        => $is_correct,
                ]);
            } else if ($questionType == "Výber odpovede") {
                $correctAnswer = SelectOption::where('question_id', $question->id)->where('is_correct', true)->get()->first()->text;
                $questionAnswer = SelectOption::find($questionAnswer);

                $is_correct = ($correctAnswer == $questionAnswer->text);
                if($is_correct)$points++;
                Answer::create([
                    'attendance_id'     => $attendance->id,
                    'question_id'       => $question->id,
                    'text'              => null,
                    'img_path'          => null,
                    'select_option_id'  => $questionAnswer->id,
                    'is_correct'        => $is_correct,
                ]);
            } else if ($questionType == "Párovanie odpovedí") {
                $answer = Answer::create([
                    'attendance_id'     => $attendance->id,
                    'question_id'       => $question->id,
                    'text'              => null,
                    'img_path'          => null,
                    'select_option_id'  => null,
                    'is_correct'        => true,
                ]);

                $is_correct = true;
                $pairCorrect = true;
                foreach ($questionAnswer as $leftId => $rightId) {
                    $leftVal = LeftPairOption::find($leftId)->text;
                    $rightVal = ($rightId != null) ? RightPairOption::find($rightId)->text : null;

                    $pairAnswer = PairAnswer::create([
                        'answer_id'     => $answer->id,
                        'question_id'   => $question->id,
                        'is_correct'    => $is_correct
                    ]);

                    LeftPairOption::create([
                        'text'          => $leftVal,
                        'pair_answer_id'=> $pairAnswer->id,
                        'question_id'   => $question->id
                    ]);
                    RightPairOption::create([
                        'text'          => $rightVal,
                        'pair_answer_id'=> $pairAnswer->id,
                        'question_id'   => $question->id
                    ]);

                    if (!($leftId == $rightId)) {
                        $is_correct = false;
                        $pairCorrect = false;
                    }
                    else{
                        $pairCorrect = true;
                    }
                    $pairAnswer->is_correct = $pairCorrect;
                    $pairAnswer->save();
                    
                }
                if($is_correct) $points++;
                $answer->is_correct = $is_correct;
                $answer->save();
            } else if ($questionType == "Nakreslenie obrázku") {
                if (!isset($questionAnswer->file)) {
                    $file = $questionAnswer["canvas"];
                    $answer = Answer::create([
                        'attendance_id'     => $attendance->id,
                        'question_id'       => $question->id,
                        'text'              => null,
                        'img_path'          => null,
                        'canvas'            => $file,
                        'select_option_id'  => null,
                        'is_correct'        => false,
                    ]);
                } else {
                    $file = $questionAnswer["file"];
                    $path = '/storage/' . Storage::putFile('files', $file);
                    Answer::create([
                        'attendance_id'     => $attendance->id,
                        'question_id'       => $question->id,
                        'text'              => $questionAnswer,
                        'img_path'          => $path,
                        'select_option_id'  => null,
                        'is_correct'        => false,
                    ]);
                }
            } else if ($questionType == "Napísanie matematického výrazu") {
                if (!isset($questionAnswer->file)) {
                    Answer::create([
                        'attendance_id'     => $attendance->id,
                        'question_id'       => $question->id,
                        'text'              => $questionAnswer['equation'],
                        'img_path'          => null,
                        'select_option_id'  => null,
                        'is_correct'        => false,
                    ]);
                } else {
                    $file = $questionAnswer["file"];
                    $path = '/storage/' . Storage::putFile('files', $file);
                    Answer::create([
                        'attendance_id'     => $attendance->id,
                        'question_id'       => $question->id,
                        'text'              => null,
                        'img_path'          => $path,
                        'select_option_id'  => null,
                        'is_correct'        => false,
                    ]);
                }
            }
        }
        $attendance->points = $points;
        $attendance->save();
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }

    /**
     * Exports exam into pdf
     */
    public function exportPdf(Exam $exam, Attendance $attendance)
    {
        $answers = Answer::where('attendance_id', $attendance->id)->get();

        $pairAnswer = [];
        foreach ($answers as $answer) {
            if ($answer->questionType->type_id == 3) {
                $pairAnswer[] = PairAnswer::where('answer_id', $answer->id)->get();
            }
        }

        // share data to view
        $pdf = PDF::loadView("attendances.show_pdf",  [
            'exam'          => $exam,
            'attendance'    => $attendance,
            'answers'       => $answers,
            'pairAnswer'    => $pairAnswer
        ]);

        return $pdf->download("test.pdf");
    }
}
