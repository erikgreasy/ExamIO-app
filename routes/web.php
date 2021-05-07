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

Route::resource( 'exams', ExamController::class);

Route::resource( 'questions', QuestionController::class);

Route::resource('exams.attendances', AttendanceController::class)->middleware('auth');
Route::get('/attendances/create', [AttendanceController::class, 'create'])->name('attendances.create');

Route::get('/dashboard', function () {
    $userId = auth()->id();
    $myExams = Exam::where('user_id', $userId)->get();
    return view('dashboard')->with('exams', $myExams);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
