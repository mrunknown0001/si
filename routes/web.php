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


Route::get('/home', function() {
	return view('home');
})->name('login');

/*
 * Route to go to student login
 */
Route::get('/student/login', function () {
	return view('student-login');
})->name('student_login');


/*
 * Admin Login
 */
Route::get('/admin/login', function () {
	return view('admin-login');
})->name('admin_login');


/*
 * Teacher's Login
 */
Route::get('/teacher/login', function () {
	return view('teacher-login');
})->name('teachers_login');


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
	 * Route to change Password in Admin
	 */
	Route::post('change-password', [
		'uses' => 'GeneralController@postChangePassword',
		'as' => 'admin_post_change_password'
		]);

	Route::get('change-password', function () {
		return abort(404);
	});


	/*
	 * Route to Admin Profile
	 */
	Route::get('profile', [
		'uses' => 'AdminController@adminProfile',
		'as' => 'admin_profile'
		]);


	/*
	 * Route to update admin profile in form
	 */
	Route::get('profile-update', [
		'uses' => 'AdminController@showProfileUpdate',
		'as' => 'admin_show_profile_update'
		]);


	/*
	 * route to update the admin profile
	 */
	Route::post('profile-update', [
		'uses' => 'AdminController@postProfileUpdate',
		'as' => 'admin_post_profile_update'
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

		Route::post('add', [
			'uses' => 'AdminController@postAddCoAdmin',
			'as' => 'admin_post_add_co_admin'
			]);


		/*
		 * Route to edit co-admin by admin
		 */
		Route::get('edit/{user_id}', [
			'uses' => 'AdminController@showCoAdminProfile',
			'as' => 'admin_get_edit_co_admin'
			]);

		Route::get('edit', function () {
			return redirect()->route('co_admin_view');
		});

		Route::post('edit', [
			'uses' => 'AdminController@postUpdateCoAdminProfile',
			'as' => 'admin_post_update_co_admin_profile'
			]);


		/*
		 * Route to remove co-admin
		 */
		Route::get('remove/{id}', [
			'uses' => 'AdminController@getRemoveCoAdmin',
			'as' => 'admin_get_remove_co_admin'
			]);

		Route::get('remove', function () {
			return abort(404);
		});


		/*
		 * Assign Block/Section/Class in co-admi/teacher/adviser
		 */
		Route::get('assign-block', function () {
			return view('admin.co-admin-assign-block');
		})->name('admin_co_admin_assign_block');


		Route::post('assign-block', [
			'uses' => 'AdminController@postAssignBlock',
			'as' => 'admin_post_assign_block'
			]);


		/*
		 * Route to view assigned block/section to co-admin/adiviser
		 */
		Route::get('view-block-assignment', [
			'uses' => 'AdminController@viewBlockAssignment',
			'as' => 'admin_view_block_assignment'
			]);


		/*
		 * Route to clear block assignment to adviser
		 */
		Route::get('clear-block-assign/{id}', [
			'uses' => 'AdminController@clearBlockAssign',
			'as' => 'admin_clear_block_assign'
			]);

		Route::get('clear-block-assign', function () {
			return abort(404);
		});


		/*
		 * Route to Assign Subject to Teacher/Adviser
		 */
		Route::get('assign-subject/{level?}', [
			'uses' => 'AdminController@assignSubjectPerGrade',
			'as' => 'admin_assign_subject'
			]);


		Route::post('assign-subject',[
			'uses' => 'AdminController@postAssignSubject',
			'as' => 'admin_post_assign_subject'
			]);


		/*
		 * Route to Show all assigned subejct to teachers
		 */
		Route::get('subject-assignments', [
			'uses' => 'AdminController@getSubjectAssignments',
			'as' => 'admin_get_subject_assignments'
			]);


		/*
		 * Route to remove subject assignments in a teacher
		 */
		Route::get('subject-assign-remove/{id}', [
			'uses' => 'AdminController@getSubjectAssignRemove',
			'as' => 'admin_get_subject_assign_remove'
			]);

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

		Route::post('import', [
			'uses' => 'AdminController@postImportStudents',
			'as' => 'admin_import_student'
			]);


		/*
		 * Route to view all students
		 */
		Route::get('view',[
			'uses' => 'AdminController@getAllStudents',
			'as' => 'students_view'
			]);


		/*
		 * Route to student search by lrn or by name
		 */
		Route::get('search', [
			'uses' => 'AdminController@studentSearch'
			])->name('student_search');


		/*
		 * Route to view edit information of the sdtudents
		 */
		Route::get('edit/{lrn}', [
			'uses' => 'AdminController@editStudentInfo',
			'as' => 'admin_get_edit_student_info'
			]);

		Route::get('edit', function () {
			return redirect()->route('students_view');
		});


		/*
		 * Route to update student details
		 */
		Route::post('edit', [
			'uses' => 'AdminController@postUpdateStudentInfo',
			'as' => 'admin_post_update_student_info'
			]);


		/*
		 * Route to students filter/search
		 */
		Route::get('filter-search', function () {
			return view('admin.students-filter');
		})->name('students_filter');


		/*
		 * Route to filter students
		 */
		Route::post('filter-search', [
			'uses' => 'AdminController@studentFilter',
			'as' => 'admin_students_filter'
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

		Route::post('add', [
			'uses' => 'AdminController@postAddSubject',
			'as' => 'admin_post_add_subject'
			]);


		/*
		 * Route to remove subject in database
		 */
		Route::get('remove/{id}', [
			'uses' => 'AdminController@removeSubject',
			'as' => 'admin_get_remove_subject'
			]);

		Route::get('remove', function () {
			return abort(404);
		});


		/*
		 * Route to show subject edit
		 */
		Route::get('edit/{id}', [
			'uses' => 'AdminController@showSubjectEdit',
			'as' => 'admin_get_edit_subject'
			]);

		Route::get('edit', function () {
			return abort(404);
		});


		/*
		 * Route to update subject
		 */
		Route::post('edit', [
			'uses' => 'AdminController@postSubjectUpdate',
			'as' => 'admin_post_subject_update'
			]);


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

		Route::post('add', [
			'uses' => 'AdminController@postAddGradeLevel',
			'as' => 'admin_post_add_grade_level'
			]);


		/*
		 * Route to view grade levels
		 */
		Route::get('view', [
			'uses' => 'AdminController@getAllGradeLevels',
			'as' => 'grade_levels_view'
			]);


		/*
		 * Route to remove grade level
		 */
		Route::get('remove/{id}', [
			'uses' => 'AdminController@getRemoveGradeLevel',
			'as' => 'admin_get_remove_grade_level'
			]);

		Route::get('remove', function () {
			return abort(404);
		});


		/*
		 * Route to edit show grade subject
		 */
		Route::get('edit/{code}', [
			'uses' => 'AdminController@showGradeLevelEdit',
			'as' => 'admin_show_grade_level_edit'
			]);

		Route::get('edit', function () {
			return abort(404);
		});

		Route::post('edit', [
			'uses' => 'AdminController@postGradeLevelUpdate',
			'as' => 'admin_post_grade_level_update'
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
		 * Route to add an active school year
		 */
		Route::post('add', [
			'uses' => 'AdminController@postAddNewSchoolYear',
			'as' => 'admin_post_add_new_school_year'
			]);


		/*
		 * Route to show all quarter
		 */
		Route::get('select-quarter', [
			'uses' => 'AdminController@showQuarterSelect'
			])->name('school_year_select_quarter');


		/*
		 * Route to select quarter
		 */
		Route::get('select-quarter/{id}', [
			'uses' => 'AdminController@selectActiveQuarter',
			'as' => 'admin_select_active_quarter'
			]);


		/*
		 * Route to finished selected quarter
		 */
		Route::get('finish-quarter/{id}', [
			'uses' => 'AdminController@finishSelectedQuarter',
			'as' => 'admin_finish_selected_quarter'
			]);
		
		Route::get('finish-quarter', function () {
			return redirect()->route('school_year_select_quarter');
		});


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
		 * Route to add new grade block to database
		 */
		Route::post('add', [
			'uses' => 'AdminController@postAddGradeBlock',
			'as' => 'admin_post_add_grade_block'
			]);


		/*
		 * Route to view all grade block
		 */
		Route::get('view', [
			'uses' => 'AdminController@getAllGradeBlocks',
			'as' => 'grade_blocks_view'
			]);


		/*
		 * Route to remove grade block in database
		 */
		Route::get('remove/{id}', [
			'uses' => 'AdminController@getGradeBlockRemove',
			'as' => 'admin_get_grade_block_remove'
			]);


		/*
		 * Rout to edit view of grade block
		 */
		Route::get('edit/{id}', [
			'uses' => 'AdminController@showGradeBlockEdit',
			'as' => 'admin_show_grade_block_edit'
			]);

		Route::get('edit', function () {
			return abort(404);
		});

		Route::post('edit', [
			'uses' => 'AdminController@postGradeBlockUpdate',
			'as' => 'admin_post_grade_block_update'
			]);

	});


	/*
	 * Route to Export Grades (view)
	 */
	Route::get('export', [
		'uses' => 'AdminController@getExportView'
		])->name('admin_export_grade');

	Route::post('export', [
		'uses' => 'AdminController@exportGrade',
		'as' => 'admin_post_export_grade'
		]);

});


/*
 * Route Group co-admin
 * middleware auth and checkcoadmin
 */
Route::group(['prefix' => 'ca', 'middleware' => ['auth', 'checkcoadmin']], function () {

	/*
	 * Route to co-admin dashboard
	 */
	Route::get('dashboard', [
		'uses' => 'CoAdminController@getInitInfo'
		])->name('co_admin_home');

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
	 * Route to show profile of co-admin in form
	 */
	Route::get('profile-update', [
		'uses' => 'CoAdminController@showProfileUpdate',
		'as' => 'co_admin_show_profile_update'
		]);


	/*
	 * Route to update profile of co-admin
	 */
	Route::post('profile-update', [
		'uses' => 'CoAdminController@postProfileUpdate',
		'as' => 'co_admin_post_profile_update'
		]);


	/*
	 * Route to co-admin settings
	 */
	Route::get('settings', function () {
		return view('coadmin.co-admin-settings');
	})->name('co_admin_settings');


	/*
	 * Route to change Password in co-Admin
	 */
	Route::post('change-password', [
		'uses' => 'GeneralController@postChangePassword',
		'as' => 'co_admin_post_change_password'
		]);

	Route::get('change-password', function () {
		return abort(404);
	});



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
	Route::get('import-grades', [
		'uses' => 'CoAdminController@getImportedSubjects'
		])->name('co_admin_import_grades');


	/*
	 * Route to import grade of students per subject
	 */
	Route::post('import-grades', [
		'uses' => 'CoAdminController@postImportGrades',
		'as' => 'co_admin_post_import_grades'
		]);


	/*
	 * Route to export grade in co-admin
	 */
	Route::get('export', [
		'uses' => 'CoAdminController@getExportView',
		'as' => 'co_admin_view_export_grade'
		]);

	Route::post('export', [
		'uses' => 'CoAdminController@postExportGrade',
		'as' => 'co_admin_post_export_grade'
		]);

});


/*
 * Route Grou s => stands for students
 */
Route::group(['prefix' => 's', 'middleware' => ['auth', 'checkstudent']], function () {

	/*
	 * Route to students
	 */
	Route::get('panel', [
		'uses' => 'StudentController@home',
		])->name('students_home');

	Route::get('/', function () {
		return redirect()->route('students_home');
	});


	/*
	 * Route to students log
	 */
	Route::get('activity-log', [
		'uses' => 'StudentController@getAllStudentsLog',
		'as' => 'students_log'
		]);


	/*
	 * Route to settings on student
	 */
	Route::get('settings', function () {
		return view('students.students-settings');
	})->name('students_settings');


	/*
	 * Route to change password of students
	 */
	Route::post('change-password', [
		'uses' => 'GeneralController@postChangePassword',
		'as' => 'students_post_change_password'
		]);

	Route::get('change-password', function () {
		return abort(404);
	});


	/*
	 * Route to student's profile
	 */
	Route::get('profile', [
		'uses' => 'StudentController@getStudentProfile',
		'as' => 'students_profile'
		]);


	/*
	 * Route to filter grades of students options
	 */
	Route::get('view-grades', [
		'uses' => 'StudentController@getViewGrades'
		])->name('students_view_my_grades');


	/*
	 * Route to show edit a student profile
	 */
	Route::get('profile-update', [
		'uses' => 'StudentController@showProfileUpdate',
		'as' => 'students_profile_update'
		]);

	Route::post('profile-update', [
		'uses' => 'StudentController@postProfileUpdate',
		'as' => 'students_post_profile_update'
		]);


	/*
	 * Route to view full student profile data
	 */
	Route::get('full-profile-data', [
		'uses' => 'StudentController@viewFullProfileData',
		'as' => 'students_view_full_profole_data'
		]);


	/*
	 * Route to edit full student data to update
	 */
	Route::get('full-profile-data/edit',[
		'uses' => 'StudentController@showEditProfileData',
		'as' => 'students_show_edit_profile_data'
		]);

	/*
	 * Route to Update Student Data
	 */
	Route::post('full-profile-data', [
		'uses' => 'StudentController@postUpdateStudentData',
		'as' =>'students_post_update_data'
		]);

});