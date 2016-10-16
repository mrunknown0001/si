<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\UserLog;
use App\BlockAssign;
use App\SchoolYear;
use App\QuarterSelect;
use App\StudentInfo;

class CoAdminController extends Controller
{
    
    /*
     * getInitInfo()
     */
    public function getInitInfo()
    {
        $school_year = SchoolYear::where('status', 1)->where('finish', 0)->first();
        // Get Active Quarter
        $quarter = QuarterSelect::where('status', 1)->where('finish', 0)->first();

        return view('coadmin.co-admin-home', ['school_year' => $school_year, 'quarter' => $quarter]);
    }


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
        $logs = UserLog::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(15);

    	return view('coadmin.co-admin-log', ['logs' => $logs]);
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
        $gblock = BlockAssign::where('co_admin', Auth::user()->id)->first();
        
        $students = StudentInfo::where('grade_level', $gblock->level)
                            ->where('class_block', $gblock->block)
                            ->get();


    	return view('coadmin.co-admin-my-grade-blocks', ['block' => $gblock, 'students' => $students]);
    }


    /*
     * postImportGrades() use to import computed grades of students
     */
    public function postImportGrades(Request $request)
    {
        return 'Import Students Grades';
    }


    /*
     * showProfileUpdate() mehtod is used to show profile of co-admin in form
     */
    public function showProfileUpdate()
    {
        $profile = User::findorfail(Auth::user()->id);

        return view('coadmin.co-admin-show-profile', ['co_admin' => $profile]);
    }


    /*
     * postProfileUpdate() is method use to update profile of co-admin
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
        $birthday = date('Y-m-d', strtotime($request['birthday']));
        $password = $request['password'];

        $user_update = User::findorfail(Auth::user()->id);
        $user_hashed_password = Auth::user()->password;

        /*
         * Verify Availabilit of Email Address
         */
        if($email != Auth::user()->email ) {

            $email_check = User::where('email', $email)->first();

            if(!empty($email_check)) {

                return redirect()->route('co_admin_show_profile_update')->with('error_msg', 'This email: ' . $email . ' is registered with different account, please choose different active email address.');

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
                    return redirect()->route('co_admin_profile')->with('success', 'Profile Updated Successfully!');

                }
                else {

                    // redirect if password is incorrect
                    return redirect()->route('co_admin_show_profile_update')->with('error_msg', 'Incorrect Password!');
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
                return redirect()->route('co_admin_profile')->with('success', 'Profile Updated Successfully!');

            }
            else {

                // redirect if password is incorrect
                return redirect()->route('co_admin_show_profile_update')->with('error_msg', 'Incorrect Password!');
            }

        }

    }

}
