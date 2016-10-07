<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    
    /*
     * studentLogin() Method use to login students
     */
    public function studentLogin(Request $request)
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

		return "Fix it later.";

    }
}
