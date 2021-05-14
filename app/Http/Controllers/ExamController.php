<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\User;
use App\Models\Question;
use App\Models\Attendance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\ExamWindowLeft;
use Symfony\Component\HttpFoundation\StreamedResponse;

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

        return redirect()->route('exams.edit', $exam->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Responsenew
     */
    public function show(Exam $exam)
    {
        return view('exams.show', [
            'exam'  => $exam
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        return view('exams.edit', [
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
        Exam::where('id', $exam->id)
            ->update(['active' => !$exam->active]);
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        Exam::destroy($exam->id);
        //        return redirect()->route('dashboard');
    }

    /**
     * Exports exam into csv
     */
    public function exportCsv(Exam $exam)
    {
        $fileName = $exam->exam_code . '.csv';

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $attendances = $exam->attendances;
        $columns = ['AisID', 'Meno', 'Priezvisko', 'Body'];



        $callback = function () use ($attendances, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($attendances as $attendance) {
                $row['AisID']  = $attendance->ais_id;
                $row['Meno']    = $attendance->first_name;
                $row['Priezvisko']    = $attendance->last_name;
                // TODO - zmenit na implicitne hodnoty
                $row['Body']    = 20;


                fputcsv($file, [
                    $row['AisID'],
                    $row['Meno'],
                    $row['Priezvisko'],
                    $row['Body']
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }


    public function watch()
    {
        return view('exams.watch');
    }

    public function getActiveExams(User $user)
    {
        return response()->json($user->exams);
    }


    public function fireEvent(Exam $exam, Attendance $attendance)
    {

        event(new ExamWindowLeft($exam, $attendance));
    }
}
