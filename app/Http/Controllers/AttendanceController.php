<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Answer;
use App\Models\Attendance;
use App\Models\PairAnswer;
use Illuminate\Http\Request;
use App\Models\LeftPairOption;
use App\Models\RightPairOption;

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
            return view('exams.notfound');
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

        return view('attendances.show', [
            'exam'          => $exam,
            'attendance'    => $attendance,
            'answers'       => $answers
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

    public function correction(Answer $answer){
        Answer::where('id',$answer->id)->update(['is_correct'=>!$answer->is_correct]);
        
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
            'question_answer'   => 'required',
        ]);
        
            
        Attendance::where('id',$attendance->id)->update(['active' => false]);

        foreach ($exam->questions as $index => $question) {
            $questionType = $question->questionType->full_name;
            $questioAnswer = $request->question_answer[$index];

            if ($questionType == "Krátka odpoveď") {
                Answer::create([
                    'attendance_id'     => $attendance->id,
                    'question_id'       => $question->id,
                    'text'              => $questioAnswer,
                    'img_path'          => null,
                    'select_option_id'  => null,
                    'is_correct'        => false,
                ]);
            } else if ($questionType == "Výber odpovede") {
                Answer::create([
                    'attendance_id'     => $attendance->id,
                    'question_id'       => $question->id,
                    'text'              => null,
                    'img_path'          => null,
                    'select_option_id'  => $questioAnswer,
                    'is_correct'        => false,
                ]);
            } else if ($questionType == "Párovanie odpovedí") {
                // $answer = Answer::create([
                //     'attendance_id'     => $attendance->id,
                //     'question_id'       => $question->id,
                //     'text'              => null,
                //     'img_path'          => null,
                //     'select_option_id'  => null,
                //     'is_correct'        => false,
                // ]);

                // $pairAnswer = PairAnswer::create([
                //     'answer_id'     => $answer->id,
                //     'question_id'   => $question->id,
                // ]);
                
                // LeftPairOption::create([
                //     'text'          => $option['left'],
                //     'pair_answer_id'=> $pairAnswer->id,
                //     'question_id'   => $question->id
                // ]);

                // RightPairOption::create([
                //     'text'          => $option['right'],
                //     'pair_answer_id'=> $pairAnswer->id,
                //     'question_id'   => $question->id
                // ]);
            } else if ($questionType == "Nakreslenie obrázku") {
                // Answer::create([
                //     'attendance_id'     => $attendance->id,
                //     'question_id'       => $question->id,
                //     'text'              => null,
                //     'img_path'          => $questioAnswer,
                //     'select_option_id'  => null,
                //     'is_correct'        => false,
                // ]);
            } else if ($questionType == "Napísanie matematického výrazu") {
                // Answer::create([
                //     'attendance_id'     => $attendance->id,
                //     'question_id'       => $question->id,
                //     'text'              => $questioAnswer,
                //     'img_path'          => null,
                //     'select_option_id'  => null,
                //     'is_correct'        => false,
                // ]);
            }
        }

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
}
