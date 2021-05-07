<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\SelectOption;
use App\Models\Answer;
use App\Models\LeftPairOption;
use App\Models\RightPairOption;
use App\Models\PairAnswer;
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

            $question = Question::create([
                'exam_id' => $request->exam_id,
                'type_id' => 1,
                'text' => $request->question_text,
            ]);

            Answer::create([
                'attendance_id' => null,
                'question_id' => $question->id,
                'text' => $request->question_answer,
                'img_path' => null,
                'select_option_id' => null,
                'is_correct' => true
            ]);

        } else if ($request->question_type == "select_question")
        {
            $request->validate([
                'question_text' => 'required',
                'options' => 'required'
            ]);


            $question = Question::create([
                'exam_id' => $request->exam_id,
                'type_id' => 2,
                'text' => $request->question_text,
            ]);
            
        // save each option
        foreach($request->options as $option){
                $selectOption = SelectOption::create([
                   'text' => $option,
                   'question_id' => $question->id,
                   'is_correct' => true,
               ]);

               Answer::create([
                   'attendance_id' => null,
                   'question_id' => $question->id,
                   'text' => null,
                   'img_path' => null,
                   'select_option_id' => $selectOption->id,
                   'is_correct' => true
               ]);
        }

        } else if ($request->question_type == "connect_question")
        {
            $request->validate([
                'question_text' => 'required',
                'options' => 'required'
            ]);

            $question = Question::create([
                'exam_id' => $request->exam_id,
                'type_id' => 3,
                'text' => $request->question_text,
            ]);
            
            // save each option
            foreach($request->options as $option) {
               $optionLeft = LeftPairOption::create([
                    'text' => $option['left'],
                    'question_id' => $question->id
                    ]);
               $optionRight = RightPairOption::create([
                   'text' => $option['right'],
                   'question_id' => $question->id
                   ]);


               $pair = PairAnswer::create([
                   'left_pair_option_id' => $optionLeft->id,
                   'right_pair_option_id' => $optionRight->id,
                   'answer_id' => null,
                   'question_id' => $question->id
               ]);
            }


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

        return redirect()->route('exams.edit', [$request->exam_id]);
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
