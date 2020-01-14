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
    return view('auth/login');
});

Auth::routes();

##----------@@@ Start Student Attendance Routes @@@-----------##
	Route::get('student-attendance',
		[
			'as' 	=> 'student-attendance',
			'uses'  => 'StudentAttendanceController@index',
		]);
	Route::get('create-student-attendance',
		[
			'as' 	=> 'create-student-attendance',
			'uses'  => 'StudentAttendanceController@create',
		]);
	Route::get('get-student',
		[
			'as' 	=> 'get-student',
			'uses'  => 'StudentAttendanceController@get_student',
		]);

	Route::get('get-att',
		[
			'as' 	=> 'get-att',
			'uses'  => 'StudentAttendanceController@get_att',
		]);

	Route::get('present-student',
		[
			'as' 	=> 'present-student',
			'uses'  => 'StudentAttendanceController@present_student',
		]);
	Route::get('present-all',
		[
			'as' 	=> 'present-all',
			'uses'  => 'StudentAttendanceController@present_all',
		]);
	Route::get('late-all',
		[
			'as' 	=> 'late-all',
			'uses'  => 'StudentAttendanceController@late_all',
		]);
	Route::get('get-section',
		[
			'as' 	=> 'get-section',
			'uses'  => 'StudentAttendanceController@get_section',
		]);
	Route::get('late-student',
		[
			'as' 	=> 'late-student',
			'uses'  => 'StudentAttendanceController@late_student',
		]);
	Route::post('save-student-attendance',
		[
			'as' 	=> 'save-student-attendance.post',
			'uses'  => 'StudentAttendanceController@store',
		]);

##----------@@@ End Student Attendance  Routes @@@-----------##

Route::resource('/managestudent', 'ManageStudentController');
Route::resource('/academicclass', 'AcademicClassController');
Route::resource('/academicgroup', 'AcademicGroupController');
Route::get('/academicgroup/delete/{message_id}', 'GroupDelete@academicgroupdelete');
Route::get('/academicgroup/delete/{message_id}', 'GroupDelete@academicgroupdelete');
Route::resource('/academicsection', 'AcademicSectionController');
Route::resource('/academicsubject', 'AcademicSubjectController');
Route::resource('/teacher', 'TeacherController');
Route::resource('/guardian', 'GuardianController');
Route::get('/setting/language', 'SettingController@language');
Route::post('/setting/language/change', 'SettingController@languagechange');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

##----------@@@ Teacher Login  Routes @@@-----------##
// Route::get('/lecturer/dashboard', 'LecturerController@index');

##----------@@@ End Teacher Login  Routes @@@-----------##
##----------@@@ Teacher Login  Routes @@@-----------##

Route::resource('/lecturer//dashboard', 'LecturerrController');

##----------@@@ End Teacher Login  Routes @@@-----------##

Route::post('managestudent-update', 'ManageStudentController@update')->name('managestudent-update');
Route::get('academicsubject-delete/{id}', 'AcademicSubjectController@destroy')->name('academicsubject-delete');
Route::get('managestudent-delete/{id}', 'ManageStudentController@destroy')->name('managestudent-delete');
Route::get('teacher-delete/{id}', 'TeacherController@destroy')->name('teacher-delete');
