<?php

/*
 * Home route
 */
Route::get('/', function () {

	/*
	 * Checking if there are authenticated user and redirecting
	 * to the corrent path
	 */
	if(Auth::check()) {
		if(Auth::user()->privilege == 1) {
			return redirect()->route('admin_home');
		}
		else if(Auth::user()->privilege == 2) {
			return redirect()->route('co_admin_home');
		}
		else if(Auth::user()->privilege == 3) {
			return redirect()->route('students_home');
		}
		else {
			return view('home');
		}
	}
    return view('home');
})->name('home');


/*
 * Admin and Co-Admin Login
 */
Route::get('login', function () {
	return view('login');
})->name('login');

Route::post('login', [
	'uses' => 'UserController@postLogin',
	'as' => 'admin_post_login'
	]);


/*
 * Student Login
 */
Route::get('student-login', function () {
	return redirect()->route('home');
});

Route::post('student-login', [
	'uses' => 'StudentController@studentLogin',
	'as' => 'student_post_login'
	]);


/*
 * Logout function
 */
Route::get('logout', [
	'uses' => 'GeneralController@logout',
	'as' => 'logout'
	]);



/*
 * Route Group admin
 */
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'checkadmin']], function () {

	/*
	 * Route to Admin Dashboard
	 */
	Route::get('dashboard', [
		'uses' => 'AdminController@getInitInfo',
		'as' => 'admin_home'
		]);

	Route::get('/', function () {
		return redirect()->route('admin_home');
	});


	/*
	 * Route to Admin Activity Log
	 */
	Route::get('activity-log', [
		'uses' => 'AdminController@adminActivityLog',
		'as' => 'admin_activity_log'
		]);


	/*
	 * Route to admin settings
	 */
	Route::get('settings', function () {
		return view('admin.admin-settings');
	})->name('admin_settings');


	/*
	 * Route to Admin Profile
	 */
	Route::get('profile', [
		'uses' => 'AdminController@adminProfile',
		'as' => 'admin_profile'
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


		/*
		 * Route to students filter/search
		 */
		Route::get('fiter-search', function () {
			return view('admin.students-filter');
		})->name('students_filter');

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


		/*
		 * Route to view grade levels
		 */
		Route::get('view', [
			'uses' => 'AdminController@getAllGradeLevels',
			'as' => 'grade_levels_view'
			]);

	});


	/*
	 * Route Group admin/shool-year
	 */
	Route::group(['prefix' => 'school-year'], function () {

		/*
		 * Route school year
		 */
		Route::get('/', function () {
			return view('admin.school-year');
		})->name('school_year');


		/*
		 * Route to add school year
		 */
		Route::get('add', function () {
			return view('admin.school-year-add');
		})->name('school_year_add');


		/*
		 * Route to select school quarter
		 */
		Route::get('select-quarter', function () {
			return view('admin.school-year-select-quarter');
		})->name('school_year_select_quarter');

	});


	/*
	 * Route group admin/grade-block
	 */
	Route::group(['prefix' => 'grade-blocks'], function () {

		/*
		 * Route to Grade block
		 */
		Route::get('/', function () {
			return view('admin.grade-block');
		})->name('grade_blocks');


		/*
		 * Route to add new grade block
		 */
		Route::get('add', function () {
			return view('admin.grade-block-add');
		})->name('grade_blocks_add');


		/*
		 * Route to view all grade block
		 */
		Route::get('view', [
			'uses' => 'AdminController@getAllGradeBlocks',
			'as' => 'grade_blocks_view'
			]);

	});

});


/*
 * Route Group co-admin
 * middleware auth and checkcoadmin
 */
Route::group(['prefix' => 'co-admin', 'middleware' => ['auth', 'checkcoadmin']], function () {

	/*
	 * Route to co-admin dashboard
	 */
	Route::get('dashboard', function () {
		return view('coadmin.co-admin-home');
	})->name('co_admin_home');

	Route::get('/', function () {
		return redirect()->route('co_admin_home');
	});


	/*
	 * Route to co-admin profile
	 */
	Route::get('profile', [
		'uses' => 'CoAdminController@getProfile',
		'as' => 'co_admin_profile'
		]);


	/*
	 * Route to co-admin settings
	 */
	Route::get('settings', function () {
		return view('coadmin.co-admin-settings');
	})->name('co_admin_settings');


	/*
	 * Route to co-admin log
	 */
	Route::get('activity-log', [
		'uses' => 'CoAdminController@coAdminActivityLog',
		'as' => 'co_admin_log'
		]);


	/*
	 * Route to View All Subjects on co-admin
	 */
	Route::get('my-subjects', [
		'uses' => 'CoAdminController@getMySubjects',
		'as' => 'co_admin_my_subjects'
		]);


	/*
	 * Route to view grade block handled by co-admin
	 */
	Route::get('my-grade-blocks', [
		'uses' => 'CoAdminController@getMyGradeBlocks',
		'as' => 'co_admin_my_grade_blocks'
		]);


	/*
	 * route to import grade used by co-admind
	 */
	Route::get('import-grades', function () {
		return view('coadmin.co-admin-import-grades');
	})->name('co_admin_import_grades');

});


/*
 * Route Grou s => stands for students
 */
Route::group(['prefix' => 's'], function () {

	/*
	 * Route to students
	 */
	Route::get('panel', function () {
		return view('students.students-home');
	})->name('students_home');

	Route::get('/', function () {
		return redirect()->route('students_home');
	});

});