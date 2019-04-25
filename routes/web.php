<?php

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

Auth::routes();

Route::resource('/managestudent', 'ManageStudentController');
Route::resource('/attendancecrete', 'AttendanceCreateController');
Route::resource('/attendanceshow', 'AttendanceShowController');
Route::resource('/academicclass', 'AcademicClassController');
Route::resource('/academicgroup', 'AcademicGroupController');
Route::resource('/academicsection', 'AcademicSectionController');
Route::resource('/academicsubject', 'AcademicSubjectController');
Route::resource('/teacher', 'TeacherController');
Route::resource('/guardian', 'GuardianController');
Route::get('/dashboard', 'HomeController@index')->name('home');
