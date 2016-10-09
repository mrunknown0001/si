<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\UserLog;

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

        $logs = UserLog::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(15);

    	return view('admin.admin-log', ['logs' => $logs]);
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
     * This method loads the profile of admin
     */
    public function showProfileUpdate()
    {

        $admin = User::findorfail(Auth::user()->id);

        return view('admin.admin-profile-update', ['admin' => $admin]);

    }


    /*
     * This method updates the profile of admin
     */
    public function postProfileUpdate(Request $request)
    {

        /*
         * validating input
         */
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'email|required',
            'mobile' => 'required',
            'birthday' => 'required',
            'password' => 'required'
            ]);

        // Assign to varaibles
        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $email = $request['email'];
        $mobile = $request['mobile'];
        $birthday = $request['birthday'];
        $password = $request['password'];

        $user_update = User::findorfail(Auth::user()->id);
        $user_hashed_password = Auth::user()->password;

        /*
         * Verify Availabilit of Email Address
         */
        if($email != Auth::user()->email ) {

            $email_check = User::where('email', $email)->first();

            if(!empty($email_check)) {

                return redirect()->route('admin_show_profile_update')->with('error_msg', 'This email: ' . $email . ' is registered with different account, please choose different active email address.');

            }
            else {

                // Setting detauls to be updated
                $user_update->firstname = $firstname;
                $user_update->lastname = $lastname;
                $user_update->email = $email;
                $user_update->mobile = $mobile;
                $user_update->birthday = $birthday;


                // check if password is correctly typed
                if(password_verify($password, $user_hashed_password)) {

                    $user_update->save();

                    // User log for updating details
                    $user_log = new UserLog();

                    $user_log->user_id = Auth::user()->id;
                    $user_log->action = 'Update Profile';

                    $user_log->save();

                    // redirection operation successfull
                    return redirect()->route('admin_profile')->with('success', 'Profile Updated Successfully!');

                }
                else {

                    // redirect if password is incorrect
                    return redirect()->route('admin_show_profile_update')->with('error_msg', 'Incorrect Password!');
                }

            }


        }
        // If the email address is different from the current email address
        else {

            // Setting details to be updated
            $user_update->firstname = $firstname;
            $user_update->lastname = $lastname;
            $user_update->mobile = $mobile;
            $user_update->birthday = $birthday;

            // check if password is correctly typed
            if(password_verify($password, $user_hashed_password)) {

                $user_update->save();

                // User log for updating details
                $user_log = new UserLog();

                $user_log->user_id = Auth::user()->id;
                $user_log->action = 'Update Profile';

                $user_log->save();

                // redirect updating successful
                return redirect()->route('admin_profile')->with('success', 'Profile Updated Successfully!');

            }
            else {

                // redirect if password is incorrect
                return redirect()->route('admin_show_profile_update')->with('error_msg', 'Incorrect Password!');
            }

        }

    }


    /*
     * This getAllGradeBlocks() getting all info in grade block 
     */
    public function getAllGradeBlocks()
    {
        return view('admin.grade-block-view');
    }

} // End of AdminController Class
