<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

use App\User;

class CoAdminController extends Controller
{
    
    /*
     * getProfile() uses to get profile of co-admin
     */
    public function getProfile()
    {
    	// Finding the co-admin profile
    	$profile = User::findorfail(Auth::user()->id);

    	return view('coadmin.co-admin-profile', ['coadmin' => $profile]);
    }


    /*
     * coAdminActivityLog() used to get all activity of co-admin
     */
    public  function coAdminActivityLog()
    {
    	return view('coadmin.co-admin-log');
    }


    /*
     * getMySubjects() used to get all subject of a co-admin
     */
    public function getMySubjects()
    {
    	return view('coadmin.co-admin-my-subjects');
    }


    /*
     * getMyGradeBlocks() used to get all gradeblocks ofa co-admin
     */
    public function getMyGradeBlocks()
    {
    	return view('coadmin.co-admin-my-grade-blocks');
    }

}
