<?php

use App\Models\Exam;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ExamProcessController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function() {
    Route::resource('exams.questions', QuestionController::class);

    Route::get('/dashboard', function () {
        $userId = auth()->id();
        $myExams = Exam::where('user_id', $userId)->get();
        return view('dashboard')->with('exams', $myExams);
    })->name('dashboard');

    Route::get( '/watch-exams', [ExamController::class, 'watch'])->name('exams.watch');

    // EXPORT TO CSV
    Route::get( '/exams/{exam}/exportcsv', [ExamController::class, 'exportCsv'])->name('exportCsv');
});


Route::resource( 'exams', ExamController::class);

Route::resource( 'exams.questions', QuestionController::class);

Route::resource('exams.attendances', AttendanceController::class);
Route::get('/attendances/create', [AttendanceController::class, 'create'])->name('attendances.create');

Route::get( '/user/{user}/exams', [ExamController::class, 'getActiveExams'])->name('user.exams');
Route::get('/exams/{exam}/attendance/{attendance}', [ExamController::class, 'fireEvent'])->name('exams.event');


require __DIR__.'/auth.php';
