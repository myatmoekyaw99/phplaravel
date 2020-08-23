<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('/grades','GradeController');
Route::resource('/subjects','SubjectController');
Route::resource('/students','StudentController');
Route::resource('/exams','ExamController');
Route::resource('/questions','QuestionController');
Route::resource('/answers','AnswerController');
Route::resource('/results','ResultController');
Route::resource('/attendence','AttendenceController');