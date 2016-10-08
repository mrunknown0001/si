<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

use App\UserLog;
use App\StudentLog;

class GeneralController extends Controller
{


	/*
	 * This method is use to logout users
	 */
	public function logout()
	{

		/*
		 * UserLog  1 and 2 and StudentLog 3
		 */
		if(Auth::user()->privilege == [1, 2]) {
			/*
			 * UserLog
			 */
			$user_log = new UserLog();

			$user_log->user_id = Auth::user()->id;
			$user_log->action = 'Logout to your account';
		}
		else if(Auth::user()->privilege == 3) {
			/*
			 * Save students log
			 */
			$students_log = new StudentLog();

			$students_log->student = Auth::user()->id;
			$students_log->action = 'Logout to your account';

			$students_log->save();
		}

		/*
		 * Script to Logout a logged in user
		 */
		 Auth::logout();

		return redirect()->route('home');
	}

}
