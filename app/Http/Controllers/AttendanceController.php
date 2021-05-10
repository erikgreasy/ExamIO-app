<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Attendance;
use App\Models\Answer;
use Illuminate\Http\Request;

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

        if(!$exam) {
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
    public function store(Exam $exam,Request $request)
    {
        return redirect()->route('exams.show', Exam::findOrFail($request->exam_id));
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
            return; // TODO where return??

        $answers = Answer::where('attendance_id', $attendance->id)->get();

        return view('attendances.show', [
            'answers'  => $answers
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
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
