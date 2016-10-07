<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{

	/*
	 * This method is use to logout users
	 */
	public function logout()
	{

		/*
		 * Script to Logout a logged in user
		 */
		 Auth::logout();

		return redirect()->route('home');
	}

}
