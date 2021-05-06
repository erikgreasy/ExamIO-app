<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Exam::where('user_id', auth()->id())->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'exam_title' => 'required|max:50',
            'time_limit' => 'required',
            'exam_description' => 'required|max:255',
        ]);

        $exam = Exam::create([
            'exam_code' => Str::random(5),
            'user_id' => auth()->id(),
            'time_limit' => $request->time_limit,
            'active' => true,
            'title' => $request->exam_title,
            'description' => $request->exam_description,
        ]);

        return $this->show($exam);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        return view('exams.show');
        // $questions = Question::where('exam_id', $exam->id)->get();

        // return view('exams.show')
        //             ->with('exam_title', $exam->title)
        //             ->with('time_limit', $exam->time_limit)
        //             ->with('exam_description', $exam->description)
        //             ->with('exam_code', $exam->exam_code)
        //             ->with('questions', $questions)
        //             ->with('exam_id', $exam->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        return view( 'exams.edit', [
            'exam'  => $exam
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
