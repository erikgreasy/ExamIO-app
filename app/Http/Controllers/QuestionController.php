<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Question::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('questions.create');
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
            'question_type' => 'required',
            'exam_id' => 'required',
        ]);


// store question based on question_type
        if ($request->question_type == "text_question")
        {
            $request->validate([
                'question_text' => 'required',
                'question_answer' => 'required',
            ]);
            // save question
            $exam = Question::create([
                'exam_id' => $request->exam_id,
                'type_id' => 1,
                'text' => $request->question_text,
            ]);
            // save answer into answers with empty attendance_id
            // TODO

        } else if ($request->question_type == "select_question")
        {
            $request->validate([
                'question_text' => 'required',
                'question_answer' => 'required',
                'number_of_options' => 'required'
            ]);
            // save question
            $exam = Question::create([
                'exam_id' => $request->exam_id,
                'type_id' => 2,
                'text' => $request->question_text,
            ]);
            for ($i=0; $i < $request->number_of_options; $i++){
                // save each $request->option_0 ...
            }
            // save answer into answers with empty attendance_id
            // TODO

        } else if ($request->question_type == "connect_question")
        {
            $request->validate([
                'question_text' => 'required',
                'question_answer' => 'required',
                'number_of_options' => 'required'
            ]);
            // save question
            $exam = Question::create([
                'exam_id' => $request->exam_id,
                'type_id' => 3,
                'text' => $request->question_text,
            ]);
            for ($i=0; $i < $request->number_of_options; $i++){
                // save each $request->option_0_left AND $request->option_0_left ...
            }
            // save answer into answers with empty attendance_id
            // TODO
        } else if ($request->question_type == "image_question") {
            $request->validate(['question_text' => 'required',]);
            Question::create([
                'exam_id' => $request->exam_id,
                'type_id' => 4,
                'text' => $request->question_text,
            ]);

        } else if ($request->question_type == "formula_question") {
            $request->validate(['question_text' => 'required',]);
            Question::create([
                'exam_id' => $request->exam_id,
                'type_id' => 5,
                'text' => $request->question_text,
            ]);
        }

        return redirect('/exams/' .  $request->exam_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
