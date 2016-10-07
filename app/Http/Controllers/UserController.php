<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
	/*
	 * postLogin() method use to login admin and co-admins
	 */ 
	public function postLogin(Request $request)
	{
		/*
		 * Validating Input from Admin and Co-Admin Login form
		 */
		$this->validate($request, [
			'id' => 'required',
			'password' => 'required'
			]);

		/*
		 * Assigning values to variables
		 */
		$id = $request['id'];
		$password = $request['password'];

		/*
		 * Authentication Login attemp
		 */
		if(Auth::attempt(['user_id' => $id, 'password' => $password])) {
            
            /*
             * Redirect to Admin Panel if privilege is admin
             */
            if(Auth::user()->privilege == 1) {
				return redirect()->route('admin_home');
			}

			/*
			 * Redirect to Co-Admin Panel if privilege is co-admin
			 */
			if(Auth::user()->privilege == 2) {
				return redirect()->route('co_admin_home');
			}

    	}

    	/*
    	 * Redirect to Login form if the user id or password is incorrect or if not in database
    	 */
    	return redirect()->route('login')->with('error_msg', 'ID or Password Incorrect!');
	}

}
