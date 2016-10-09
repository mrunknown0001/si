<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

use App\UserLog;
use App\StudentLog;
use App\User;
use App\PasswordChange;

class GeneralController extends Controller
{


	/*
     * postChangePassword() method to cnhange password for students
     */
    public function postChangePassword(Request $request)
    {
    	/*
    	 * input validation
    	 */
    	$this->validate($request, [
    		'old_pass' => 'required',
    		'password' => 'required| min:8 | max:64 | confirmed',
    		'password_confirmation' => 'required'
    		]);

    	
    	// Assign values to variable
    	$old_pass = $request['old_pass'];
    	$password = $request['password'];


    	// Check if old password and new password is the same, this is not permitted
    	if($old_pass == $password) {
    		return redirect()->back()->with('error_msg', 'Choose different password from your current password.');    	}

    	// bcrypt (hashed) password of students
    	$hashed_password = Auth::user()->password;

    	// id of the student
    	$user_id = Auth::user()->id;

    	// verify the entered old password
    	$password_compare = password_verify($old_pass, $hashed_password);
    	if($password_compare == True) {
    		$user = User::findorfail($user_id);

    		$user->password = bcrypt($password);

    		$user->save();

    		/*
			 * Save students log
			 */
    		if(Auth::user()->privilege == 3) {
				$students_log = new StudentLog();

				$students_log->student = Auth::user()->id;
				$students_log->action = 'Password Change';

				$students_log->save();
			}
			else {
				$user_log = new UserLog();
					
				$user_log->user_id = $user_id;
				$user_log->action = 'Password Change';

				$user_log->save();
			}

			$password_change = PasswordChange::where('user_id', Auth::user()->id)->first();

			if(empty($password_change)) {
				
				$change = new PasswordChange();

				$change->user_id = Auth::user()->id;
				$change->status = 1;

				$change->save();

			}

    		// Successfully Change Password
    		if(Auth::user()->privilege == 3) {
	    		return redirect()->route('students_settings')->with('success', 'Your Password Has Been Successfully Changed!');
	    	}
	    	// for co-admin
	    	else if(Auth::user()->privilege == 2) {
	    		return redirect()->route('co_admin_settings')->with('success', 'Your Password Has Been Successfully Changed!');
	    	}
	    	// for admin
	    	else if(Auth::user()->privilege == 1) {
	    		return redirect()->route('admin_settings')->with('success', 'Your Password Has Been Successfully Changed!');
	    	}
	    	// if error occured
	    	else {
	    		return 'Error Occured! Please Reload this page';
	    	}
    	}
    	else {
    		// Wrong Password
    		return redirect()->route('students_settings')->with('error_msg', 'Your Password is Incorrect! Please Try Again.');
    	}
    
    }


	/*
	 * This method is use to logout users
	 */
	public function logout()
	{

		/*
		 * UserLog  1 and 2 and StudentLog 3
		 */
		if(Auth::user()->privilege == 1 || Auth::user()->privilege == 2) {
			/*
			 * UserLog
			 */
			$user_log = new UserLog();

			$user_log->user_id = Auth::user()->id;
			$user_log->action = 'Logout to your account';

			$user_log->save();

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
