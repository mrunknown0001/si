<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

use App\User;

class AdminController extends Controller
{
    
	/*
	 * This getInitInfo() methos is used to get all the informaton
	 * needed in the Dashboard of the Admin.
	 * Example: Total counts of Co-Admin, Students, etcs...
	 * Passing Values to Homepage of the Admin Dashboard
	 */
    public function getInitInfo()
    {
    	return view('admin.admin-home');
    }


    /*
     * This getAllCoAdmins() methos is used to get all Co-Admins Basic Information
     * and return in to view to show summarize information.
     */
    public function getAllCoAdmins()
    {
    	return view('admin.co-admin-view');
    }


    /*
     * This getAllStudents() method is use to get basic info of students
     * and return in to view to show summarize information
     */
    public function getAllStudents()
    {
    	return view('admin.students-view');
    }


    /*
     * This getAllSubjects() methods is use to get all info of subjects
     */
    public function getAllSubjects()
    {
    	return view('admin.subjects-view');
    }


    /*
     * This getAllGradeLevels() method use to get info of grade levels
     */
    public function getAllGradeLevels()
    {
    	return view('admin.grade-levels-view');
    }


    /*
     * This adminActivityLog() returns all the activity made by admin
     */
    public function adminActivityLog()
    {
    	return view('admin.admin-log');
    }


    /*
     * This adminProfile() shows the profile of the admin
     */
    public function adminProfile()
    {
        /*
         * Load the profile of the admin and pass it to view
         */
        $profile = User::findorfail(Auth::user()->id);

    	return view('admin.admin-profile', ['admin' => $profile]);
    }


    /*
     * This getAllGradeBlocks() getting all info in grade block 
     */
    public function getAllGradeBlocks()
    {
        return view('admin.grade-block-view');
    }

} // End of AdminController Class
