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
        // Get count of active co-admins
        $co_admins = User::where(['privilege' => 2, 'status' => 1])->count();
        // Get count of active students/currently enrolled
        $students = User::where(['privilege' => 3, 'status' => 1])->count();

    	return view('admin.admin-home', ['co_admins' => $co_admins, 'students' => $students]);
    }


    /*
     * This getAllCoAdmins() methos is used to get all Co-Admins Basic Information
     * and return in to view to show summarize information.
     */
    public function getAllCoAdmins()
    {
        // Get all active co-admins
        $co_admins = User::where(['privilege' => 2, 'status' => 1])->orderBy('user_id', 'asc')->paginate(15);

    	return view('admin.co-admin-view', ['ca' => $co_admins]);
    }


    /*
     * postAddCoAdmin() method is use to add co-admin/teacher in the database
     * default password for co-admin: admin
     */
    public function postAddCoAdmin(Request $request)
    {

        /*
         * Input Validation
         */
        $this->validate($request, [
            'user_id' => 'required|unique:users',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'mobile' => 'required',
            'birthday' => 'required'
            ]);

        // Assigning Values to variables
        $user_id = $request['user_id'];
        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $email = $request['email'];
        $mobile = $request['mobile'];
        $birthday = $request['birthday'];

        // Check User ID Availability
        $user_id_check = User::where('user_id', $user_id)->first();

        if(!empty($user_id_check)) {
            return redirect()->route('co_admin_add')->with('error_msg', 'This User ID: ' . $user_id . ' is already in use.');
        }

        // Check email availability
        $email_check = User::where('email', $email)->first();

        if(!empty($email_check)) {
            return redirect()->route('co_admin_add')->with('error_msg', 'This email: ' . $email . ' is registered with different account, please choose different active email address.');
        }

        $add = new User();

        $add->user_id = $user_id;
        $add->firstname = $firstname;
        $add->lastname = $lastname;
        $add->email = $email;
        $add->mobile = $mobile;
        $add->birthday = $birthday;

        $add->password = bcrypt('admin');
        $add->privilege = 2;
        $add->status = 1;

        if($add->save()) {

            // Add log to admin
            $log = new UserLog();

            $log->user_id = Auth::user()->id;
            $log->action = 'Added Co-Admin with User ID: ' . $user_id;

            $log->save();

            return redirect()->route('co_admin_add')->with('success', 'Co-Admin Added with User ID: ' . $user_id);

        }

        // If something is wrong
        return redirect()->route('co_admin_add')->with('error_msg', 'Something is Wrong! Please reload this page.');

    }


    /*
     * showCoAdminProfile() methos is use to show co-admin profile to edit
     */
    public function showCoAdminProfile($user_id = null)
    {
        $user = User::where('user_id', $user_id)->first();

        /*
         * If user trying to modify is admin, this is not allowed
         * redirect to list of co-admin
         */
        if($user->privilege == 1) {
            return redirect()->route('co_admin_view')->with('error_msg', 'Oppss! Something Fishy! Please reload this page');
        }

        if(empty($user)) {
            // If user is empty/ not in the database
            return abort(404);
        }

        return view('admin.co-admin-edit', ['user' => $user]);

    }


    /*
     * postUpdateCoAdminProfile() method is use to update from edit from
     */
    public function postUpdateCoAdminProfile(Request $request)
    {

        /*
         * Input validation
         */
        $this->validate($request, [
            'user_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'birthday' => 'required'
            ]);

        // Assigning Values to variables
        $id = $request['id'];
        $user_id = $request['user_id'];
        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $email = $request['email'];
        $mobile = $request['mobile'];
        $birthday = $request['birthday'];

        if($id == null) {
            // If the script is modified suspiciously
            return 'Error Occured. Please Reload This Page.';
        }

        // get Details of user
        $user = User::findorfail($id);

        /*
         * If user trying to modify is admin, this is not allowed
         * redirect to list of co-admin
         */
        if($user->privilege == 1) {
            return redirect()->route('co_admin_view')->with('error_msg', 'Oppss! Something Fishy! Please reload this page');
        }

        // Check and Verify availability of user id
        if($user_id != $user->user_id) {
            // check if user id is existing
            $user_id_check = User::where('user_id', $user_id)->first();

            if($user_id_check == True) {
                return redirect()->route('admin_get_edit_co_admin', $user->user_id)->with('error_msg', 'User ID already in use.');
            }
        }

        // Check and Verify availability of email address
        if($email != $user->email) {
            // check email is existing
            $email_check = User::where('email', $email)->first();

            if($email_check == True) {
                return redirect()->route('admin_get_edit_co_admin', $user->user_id)->with('error_msg', 'Email already in use.');
            }

        }

        /*
         * Note: updating without changes can catch here
         */


        // Assign new Values to co-admin details
        $user->user_id = $user_id;
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->email = $email;
        $user->mobile = $mobile;
        $user->birthday = $birthday;

        if($user->save()) {
            return redirect()->route('admin_get_edit_co_admin', $user->user_id)->with('success', 'Co-Admin Details Successfully Updated');
        }
        else {
            return redirect()->route('admin_get_edit_co_admin', $user->user_id)->with('error_msg', 'Error Occured! Please try again later.');
        }

    }


    /*
     * postRemoveCoAdmin() method is use to remove co-admin in the database
     */
    public function getRemoveCoAdmin($id = null)
    {
        if($id == null) {
            return 'Error Occured! Please Reload this page.';
        }

        // check user is valid and active
        $user = User::findorfail($id);

        $user_id = $user->user_id;

        if($user->privilege != 2 || $user->status != 1) {
            // Abort to 404 page if the user is not co-admin or inactive
            return abort(404);
        }

        if($user->delete()) {

            $log = new UserLog();

            $log->user_id = Auth::user()->id;
            $log->action = 'Removed Co-Admin with User ID: ' . $user_id;

            $log->save();

            // Redirect if the operation is successful
            return redirect()->route('co_admin_view')->with('success', 'Successfully Remove Co-Admin.');
        }

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
