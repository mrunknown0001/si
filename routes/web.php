<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', function () {
    return view('home');
})->name('home');


/*
 * Route Group admin
 */
Route::group(['prefix' => 'admin'], function () {

	/*
	 * Route to Admin Dashboard
	 */
	Route::get('/', [
		'uses' => 'AdminController@getInitInfo',
		'as' => 'admin_home'
		]);


	/*
	 * Route Group admin/co-admin
	 */
	Route::group(['prefix' => 'co-admin'], function () {

		/*
		 * Route to Co-Admin
		 */
		Route::get('/', function () {
			return view('admin.co-admin');
		})->name('co_admin');


		/*
		 * Route to View all Co-Admin Users
		 */
		Route::get('view', [
			'uses' => 'AdminController@getAllCoAdmins',
			'as' => 'co_admin_view'
			]);


		/*
		 * Route to Add Co-Admin/Teacher Form
		 */
		Route::get('add', function () {
			return view('admin.co-admin-add');
		})->name('co_admin_add');

	});


	/*
	 * Route Group admin/students
	 */
	Route::group(['prefix' => 'students'], function () {

		/*
		 * Route to Students
		 */
		Route::get('/', function () {
			return view('admin.students');
		})->name('students');


		/*
		 * Route to Add Students
		 */
		Route::get('import', function () {
			return view('admin.students-import');
		})->name('students_import');


		/*
		 * Route to view all students
		 */
		Route::get('view',[
			'uses' => 'AdminController@getAllStudents',
			'as' => 'students_view'
			]);

	});


	/*
	 * Route group admin/subjects
	 */
	Route::group(['prefix' => 'subjects'], function () {

		/*
		 * Route to Subjects
		 */
		Route::get('/', function () {
			return view('admin.subjects');
		})->name('subjects');


		/*
		 * Route to Add Subjects
		 */
		Route::get('add', function () {
			return view('admin.subjects-add');
		})->name('subjects_add');


		/*
		 * Route to view all subjects
		 */
		Route::get('view', [
			'uses' => 'AdminController@getAllSubjects',
			'as' => 'subjects_view'
			]);
	});


	/*
	 * Route group admin/grade-levels
	 */
	Route::group(['prefix' => 'grade-levels'], function () {

		/*
		 * Route to Grade Levels
		 */
		Route::get('/', function () {
			return view('admin.grade-levels');
		})->name('grade_levels');


		/*
		 * Route to add grade levels
		 */
		Route::get('add', function () {
			return view('admin.grade-levels-add');
		})->name('grade_levels_add');

	});

});