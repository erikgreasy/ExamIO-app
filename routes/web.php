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
});

Route::middleware(['auth'])->group(function() {
    Route::resource('exams.questions', QuestionController::class);

    Route::get('/dashboard', function () {
        $userId = auth()->id();
        $myExams = Exam::where('user_id', $userId)->get();
        return view('dashboard')->with('exams', $myExams);
    })->name('dashboard');
});
Route::resource( 'exams', ExamController::class);

Route::resource( 'exams.questions', QuestionController::class);

Route::resource('exams.attendances', AttendanceController::class)->middleware('auth');
Route::get('/attendances/create', [AttendanceController::class, 'create'])->name('attendances.create');



require __DIR__.'/auth.php';
