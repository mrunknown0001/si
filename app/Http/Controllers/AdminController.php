<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use DB;
use Excel;
use Illuminate\Support\Facades\Input;

use App\User;
use App\UserLog;
use App\Subject;
use App\GradeLevel;
use App\ClassBlock;
use App\SchoolYear;
use App\QuarterSelect;
use App\BlockAssign;
use App\StudentInfo;
use App\StudentImport;

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
        // Get count of subjects
        $subjects = Subject::count();
        // Get count of Grade Levels
        $grade_levels = GradeLevel::count();
        // Get count of Grade Block
        $grade_blocks = ClassBlock::count();
        // Get Active School Year
        $school_year = SchoolYear::where('status', 1)->where('finish', 0)->first();
        // Get Active Quarter
        $quarter = QuarterSelect::where('status', 1)->where('finish', 0)->first();

    	return view('admin.admin-home', ['co_admins' => $co_admins, 'students' => $students, 'subjects' => $subjects, 'grade_levels' => $grade_levels, 'grade_blocks' => $grade_blocks, 'school_year' => $school_year, 'quarter' => $quarter]);
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
            'tin' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'mobile' => 'required',
            'birthday' => 'required'
            ]);

        // Assigning Values to variables
        $user_id = $request['tin'];
        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $email = $request['email'];
        $mobile = $request['mobile'];
        $birthday = date('Y-m-d', strtotime($request['birthday']));

        // Check User ID Availability
        $user_id_check = User::where('user_id', $user_id)->first();

        if(!empty($user_id_check)) {
            return redirect()->route('co_admin_add')->with('error_msg', 'This TIN: ' . $user_id . ' is already in use.');
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
            $log->action = 'Added Co-Admin with User TIN: ' . $user_id;

            $log->save();

            return redirect()->route('co_admin_add')->with('success', 'Co-Admin Added with User TIN: ' . $user_id);

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
            'tin' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'birthday' => 'required'
            ]);

        // Assigning Values to variables
        $id = $request['id'];
        $user_id = $request['tin'];
        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $email = $request['email'];
        $mobile = $request['mobile'];
        $birthday = date('Y-m-d', strtotime($request['birthday']));

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
                return redirect()->route('admin_get_edit_co_admin', $user->user_id)->with('error_msg', 'TIN already in use.');
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

            // Log for Admin Action
            $log = new UserLog();

            $log->user_id = Auth::user()->id;
            $log->action = 'Updated Co-Admin Profile Details TIN: ' . $user_id;

            $log->save();

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
            $log->action = 'Removed Co-Admin with TIN: ' . $user_id;

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
        $students = User::where('privilege', '3')->where('status', '1')->orderBy('lastname', 'asc')->paginate(15);

    	return view('admin.students-view', ['students'=> $students]);
    }


    /*
     * This getAllSubjects() methods is use to get all info of subjects
     */
    public function getAllSubjects()
    {
        $subjects = Subject::paginate(15);

    	return view('admin.subjects-view', ['subjects' => $subjects]);
    }


    /*
     * postAddSubject() method is use to add subject
     */
    public function postAddSubject(Request $request)
    {

        /*
         * Validate User Input
         */
        $this->validate($request, [
            'code' => 'required|unique:subjects',
            'title' => 'required',
            'description' => 'required'
            ]);

        // Assign Values to Variables
        $code = $request['code'];
        $title = $request['title'];
        $description = $request['description'];

        $add = new Subject();

        $add->code = $code;
        $add->title = $title;
        $add->description = $description;

        if($add->save()) {

            $log = new UserLog();

            $log->user_id = Auth::user()->id;
            $log->action = 'Added New Subject with a code: ' . $code;

            $log->save();

            return redirect()->route('subjects_add')->with('success', 'Subject Successfully Added!');

        }

    }


    /*
     * showSubjectEdit() method is use to show subject to edit
     */
    public function showSubjectEdit($code = null)
    {

        $subject = Subject::where('code', $code)->first();

        // If the code doesn't exist in database
        if(empty($subject)) {
            return abort(404);
        }

        return view('admin.subjects-edit', ['subject' => $subject]);

    }


    /*
     * postSubjectUpdate() method use to update edited subject
     */
    public function postSubjectUpdate(Request $request)
    {

        /*
         * Input validation
         */
        $this->validate($request, [
            'code' => 'required',
            'title' => 'required',
            'description' => 'required'
            ]);

        $id = $request['id'];
        $code = $request['code'];
        $title = $request['title'];
        $description = $request['description'];

        // If id is empty
        if(empty($id)) {
            return 'System encountered error. Please reload this page.';
        }

        $subject = Subject::findorfail($id);

        if(empty($subject)) {
            // If id is not on database
            return abort(404);
        }

        // Check the availability of the subject code is the code is changed
        if(strtolower($code) != $subject->code) {

            $code_check = Subject::where('code', $code)->first();
            if($code_check == True) {
                // If the code entered is alreay in use
                return 'System encountered error. Please reload this page.';    
            }

            else {

                $subject->title = $title;
                $subject->description = $description;

                if($subject->save()) {

                    $log = new UserLog();

                    $log->user_id = Auth::user()->id;
                    $log->action = 'Updated Subject';

                    $log->save();

                    return redirect()->route('admin_get_edit_subject', strtoupper($code))->with('success', 'Subject Successfully Updated');

                }

                return 'Error in Saving Update';

            }
            
        }
        else {

            $subject->title = $title;
            $subject->description = $description;

            if($subject->save()) {

                $log = new UserLog();

                $log->user_id = Auth::user()->id;
                $log->action = 'Updated Subject';

                $log->save();

                return redirect()->route('admin_get_edit_subject', strtoupper($code))->with('success', 'Subject Successfully Updated');

            }

            return 'Error in Saving Update';

        }

    }


    /*
     * removeSubject() method is use to remove subject
     */
    public function removeSubject($code = null)
    {

        $subject = Subject::where('code', $code)->first();

        // Check if subject code belongs to a specific subject
        // If not, redirect to 404
        if(empty($subject)) {
            return abort(404);
        }

        if($subject->delete()) {

            $log = new UserLog();

            $log->user_id = Auth::user()->id;
            $log->action = 'Remove Subject';

            $log->save();

            return redirect()->route('subjects_view')->with('success', 'Subject Removed Successfully.');

        }

        return redirect()->back()->with('notice', 'Some Error Occured, Please Reload this page.');

    }


    /*
     * This getAllGradeLevels() method use to get info of grade levels
     */
    public function getAllGradeLevels()
    {

        $levels = GradeLevel::paginate(15);

    	return view('admin.grade-levels-view', ['levels' => $levels]);
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

        $blocks = ClassBlock::paginate();

        return view('admin.grade-block-view', ['blocks' => $blocks]);
    }


    /*
     * postAddGradeBlock() use to save new grade block / class block to database
     */
    public function postAddGradeBlock(Request $request)
    {

        /*
         * Input validation 
         */
        $this->validate($request, [
            'code' => 'required|unique:class_blocks',
            'title' => 'required',
            'description' => 'required'
            ]);

        // Assigning Values to Variable
        $code = $request['code'];
        $name = $request['title'];
        $description = $request['description'];

        $class = new ClassBlock();

        $class->code = $code;
        $class->name = $name;
        $class->description = $description;

        // Condition and Saving of new Grade/Class Block
        if($class->save()) {

            $log = new UserLog();

            $log->user_id = Auth::user()->id;
            $log->action = 'Added Grade or Class Block';
            // Saving Log for this activity
            $log->save();

            return redirect()->route('grade_blocks_add')->with('success', 'Grade/Class Block Successfully Added');
        }

        return 'Error Occured! Please reload this page.';
    }


    /*
     * getGradeBlockRemove() use to remove grade block in database
     */
    public function getGradeBlockRemove($id = null)
    {
        $block = ClassBlock::findorfail($id);

        if($block->delete()) {

            $log = new UserLog();

            $log->user_id = Auth::user()->id;
            $log->action = 'Removed Grade Block';
            // Save log for removing grade block
            $log->save();

            return redirect()->route('grade_blocks_view')->with('success', 'Grade Block Successfully Removed');
        }

        return 'Error Occured! Please reload this page.';
    }


    /*
     * showGradeBlockEdit() use to show and edit grade block
     */
    public function showGradeBlockEdit($code = null)
    {

        $block = ClassBlock::where('code', $code)->first();

        if(empty($block)) {
            return redirect()->route('grade_blocks_view')->with('error_msg', 'Something\'s Fishy!');
        }

        return view('admin.grade-block-edit', ['block' => $block]);
    }


    /*
     * postGradeBlockUpdate() use to save editted grade block
     */
    public function postGradeBlockUpdate(Request $request)
    {

        /*
         * Input validation
         */
        $this->validate($request, [
            'code' => 'required',
            'title' => 'required',
            'description' => 'required'
            ]);

        // Assign Values to variables
        $code = $request['code'];
        $name = $request['title'];
        $description = $request['description'];
        $id = $request['id'];

        $block = ClassBlock::findorfail($id);

        if($code != $block->code) {
        
            $code_check = ClassBlock::where('code', $code)->first();

            if(empty($code_check)) {
                return redirect()->route('admin_show_grade_block_edit', $block->code)->with('error_msg', 'Block Code is not Available.');
            }

            $block->code = $code;

        }


        $block->name = $name;
        $block->description = $description;

        if($block->save()) {

            // Adming Log in updating grade block
            $log = new UserLog();

            $log->user_id = Auth::user()->id;
            $log->action = 'Updated Grade Block';

            $log->save();

            return redirect()->route('grade_blocks_view')->with('success' ,'Grade Block Successfully Udpated!');

        }

    }


    /*
     * postAddGradeLevel() methos is use to add new grade block in database
     */
    public function postAddGradeLevel(Request $request)
    {
        
        /*
         * Input Validation
         */
        $this->validate($request,[
            'code' => 'required|unique:grade_levels',
            'title' => 'required',
            'description' => 'required'
            ]);

        // Assign values to variables
        $code = $request['code'];
        $title = $request['title'];
        $description = $request['description'];

        $grade_level = new GradeLevel();

        $grade_level->code = $code;
        $grade_level->title = $title;
        $grade_level->description = $description;

        if($grade_level->save()) {

            $log = new UserLog();

            $log->user_id = Auth::user()->id;
            $log->action = 'Added New GradeLevel';

            $log->save();

            return redirect()->route('grade_levels_add')->with('success', 'Grade Level Added Successfully!');

        }

        return 'Error Occured! Please Refresh this page.';
    }


    /*
     * getRemoveGradeLevel() use to remove grade level in the database
     */
    public function getRemoveGradeLevel($id = null)
    {
        $gl = GradeLevel::findorfail($id);

        if($gl->delete()) {

            // Admin Log
            $log = new UserLog();
            $log->user_id = Auth::user()->id;
            $log->action = 'Remove Grade Level';
            $log->save();

            return redirect()->route('')->with('success', 'Grade Level Removed Successfully!');

        }

        return 'Error Occured. Please Reload this page';
    }


    /*
     * showGradeLevelEdit() methos is use to show and edit grade level
     */
    public function showGradeLevelEdit($code = null)
    {

        $level = GradeLevel::where('code', $code)->first();

        // If code doesn't belong to any record in database
        // 404
        if(empty($level)) {
            return abort(404);
        }

        return view('admin.grade-levels-edit', ['l' => $level]);

    }


    /*
     * postGradeLevelUpdate() to save edited grade levels
     */
    public function postGradeLevelUpdate(Request $request)
    {

        /*
         * Input validation
         */
        $this->validate($request, [
            'code' => 'required',
            'title' => 'required',
            'description' => 'required'
            ]);

        // Assign Values to variables
        $id = $request['id'];
        $code = $request['code'];
        $title = $request['title'];
        $description = $request['description'];

        $level = GradeLevel::findorfail($id);

        // Check Availability of Grade Level Code, if changed
        if($code != $level->code) {
            $check_code = GradeLevel::where('code', $code)->first();

            if($check_code == True) {

                return redirect()->route('admin_show_grade_level_edit', $level->code)->with('notice', 'Grade Level not Available');

            }
            else {
                // Assign new code when updated
                $level->code = $code;

            }
        }

        $level->title = $title;
        $level->description = $description;

        if($level->save()) {

            // User Log in editting Grade Level
            $log = new UserLog();

            $log->user_id = Auth::user()->id;
            $log->action = 'Updated Grade Level';

            $log->save();

            return redirect()->route('grade_levels_view')->with('success', 'Grade Level Successfully Updated!');

        }

        // If something error in saving
        return 'error in updating grade level';

    }


    /*
     * postAddNewSchoolYear() method is use to add new active school year
     */
    public function postAddNewSchoolYear(Request $request)
    {

        /*
         * Input validation
         */
        $this->validate($request, [
            'from_year' => 'required',
            'to_year' => 'required'
            ]);

        // Assign Values to Variables
        $from = $request['from_year'];
        $to = $request['to_year'];

        $check_year = SchoolYear::where('from', $from)
                            ->where('to', $to)
                            ->where('status', 1)
                            ->first();

        if(!empty($check_year)) {
            return redirect()->route('school_year_add')->with('error_msg', 'There is an Active School Year. You Can\'t Add a new one! You can only add another school year if the current school year is finished');
        }

        $check_active = SchoolYear::where('status', 1)->first();
        if(!empty($check_active)) {
            return redirect()->route('school_year_add')->with('error_msg', 'There is an Active School Year. You Can\'t Add a new one! You can only add another school year if the current school year is finished');
        }

        $check_exists = SchoolYear::where('from', $from)->where('to', $to)->first();

        if(!empty($check_exists)) {
            return redirect()->route('school_year_add')->with('error_msg', 'This School year has in our database, please select different school year.');
        }

        $school_year = new SchoolYear();

        $school_year->from = $from;
        $school_year->to = $to;
        $school_year->status = 1;

        if($school_year->save()) {

            QuarterSelect::where('finish', 1)
                        ->update(['status' => 0, 'finish' => 0]);

            // Save log for adding school Year
            $log = new UserLog();

            $log->user_id = Auth::user()->id;
            $log->action = 'Created new school year ' . $from . ' - ' . $to;

            $log->save();

            return redirect()->route('school_year_add')->with('success', 'School Year Successfully Added!');

        }

    }


    /*
     * showQuarterSelect() use to display and select quarters
     */
    public function showQuarterSelect()
    {


        $quarter = QuarterSelect::all();

        return view('admin.school-year-select-quarter', ['quarter' => $quarter]);
    }


    /*
     * selectActiveQuarter() use to select active quarter in school year
     */
    public function selectActiveQuarter($id = null)
    {
        // Check if there is an active school year 
        $check_school_year = SchoolYear::where('status', 1)->where('finish', 0)->first();

        if(empty($check_school_year)) {

            return redirect()->route('school_year_select_quarter')->with('error_msg', 'No active school year.');
        }

        $quarter = QuarterSelect::findorfail($id);

        $quarter->status = 1;

        if($quarter->save()) {
            // Add user log for activating quarter
            $log = new UserLog();
            $log->user_id = Auth::user()->id;
            $log->action = 'Activated ' . $quarter->code . ' quarter of ' . $check_school_year->from . ' - ' . $check_school_year->to . ' school year';
            $log->save();

            return redirect()->route('school_year_select_quarter');
        }
    }


    /*
     * finishSelectedQuarter() use to finsiehd selected quarter
     */
    public function finishSelectedQuarter($id = null)
    {

        // Check if there is an active school year 
        $check_school_year = SchoolYear::where('status', 1)->where('finish', 0)->first();

        if(empty($check_school_year)) {

            return redirect()->route('school_year_select_quarter')->with('error_msg', 'No active school year.');
        }

        if($id == 4) {
            $end_school_year = SchoolYear::where('status', 1)->where('finish', 0)->first();

            $end_school_year->status = 0;
            $end_school_year->finish = 1;

            $end_school_year->save();
        }

        $quarter = QuarterSelect::findorfail($id);

        $quarter->status = 0;
        $quarter->finish = 1;

        if($quarter->save()) {
            // Add user log for activating quarter
            $log = new UserLog();
            $log->user_id = Auth::user()->id;
            $log->action = 'Finished ' . $quarter->code . ' quarter of ' . $check_school_year->from . ' - ' . $check_school_year->to . ' school year';
            $log->save();

            return redirect()->route('school_year_select_quarter');
        }
    }


    /*
     * postAssignBlock() assign section/block to co-admin/adviser
     */
    public function postAssignBlock(Request $request)
    {

        /*
         * Input Validation
         */
        $this->validate($request, [
            'co_admin' => 'required',
            'grade_level' => 'required',
            'block' => 'required'
            ]);

        // Assigning Values to Variables
        $co_admin = $request['co_admin'];
        $grade_level = $request['grade_level'];
        $block = $request['block'];

        // Checking Inputs if present in database
        $check_co_admin = User::find($co_admin);
        $check_grade_level = GradeLevel::find($grade_level);
        $check_block = ClassBlock::find($block);

        if(empty($check_co_admin) || empty($check_grade_level) || empty($check_block)) {
            return redirect()->route('admin_co_admin_assign_block')->with('error_msg', 'System Detected Data Tampering! Please reload this page.');
        }

        // Check if the assignment in the database
        $check_exists = BlockAssign::where('co_admin', $co_admin)
                        ->where('level', $grade_level)
                        ->where('block', $block)
                        ->first();
        if(!empty($check_exists)) {
            return redirect()->route('admin_co_admin_assign_block')->with('error_msg', 'The Adviser and class already in database.');
        }


        // Check if adviser is available
        $check_adviser = BlockAssign::where('co_admin', $co_admin)->first();

        if(!empty($check_adviser)) {
            return redirect()->route('admin_co_admin_assign_block')->with('error_msg', 'The Adviser has already an Assigned Class/Block.');   
        }

        // Check if the grade level and block is assigned to other
        $check_assign = BlockAssign::where('co_admin', '!=', $co_admin)
                        ->where('level', $grade_level)
                        ->where('block', $block)
                        ->first();
        if(!empty($check_assign)) {
            return redirect()->route('admin_co_admin_assign_block')->with('error_msg', 'The subject/class already assigned.');   
        }

        // Assign the class to the adviser
        $assign = new BlockAssign();

        $assign->co_admin = $co_admin;
        $assign->level = $grade_level;
        $assign->block = $block;

        if($assign->save()) {

            // Add Admin log
            $log = new UserLog();

            $log->user_id = Auth::user()->id;
            $log->action = 'Assigned Block/Section/Class in Adviser';

            $log->save();

            return redirect()->route('admin_co_admin_assign_block')->with('success', 'Class/Block Assigned Successfully.');

        }

    }


    /*
     * viewBlockAssignment() use toview block assignment
     */
    public function viewBlockAssignment()
    {
        $adviser = BlockAssign::all();

        return view('admin.co-admin-assign-block-view', ['adviser' => $adviser]);
    }


    /*
     * clearBlockAssign() method is use to clear assigned block to co-admin/adviser
     */
    public function clearBlockAssign($id = null)
    {

        /*
         * Check if the id is in the database
         */
        $assign = BlockAssign::findorfail($id);

        // Remove Assigned block to co-admin in database
        if($assign->delete()) {
            // Add log to admin
            $log = new UserLog();
            $log->user_id = Auth::user()->id;
            $log->action = 'Removed Block/Class Assignment in Co-Admin/Adviser';
            $log->save();

            return redirect()->route('admin_co_admin_assign_block')->with('success', 'Block/Class Assignment Remove Successfully.');
        }

        return 'Error Occured!';

    }


    /*
     * postImportStudents() use to import list of students per level and section
     */
    public function postImportStudents(Request $request)
    {

        /*
         * Input Validation
         */
        $this->validate($request, [
            'students' => 'required',
            'grade_level' => 'required',
            'class_block' => 'required'
            ]);

        // Assign Values to Variables
        $grade_level = $request['grade_level'];
        $class_block = $request['class_block'];

        // Check if block/class is already imported by admin to avoid redundant data/errors
        $check_import = StudentImport::where('grade_level', $grade_level)
                                    ->where('class_block', $class_block)
                                    ->where('status', '1')
                                    ->first();

        if(!empty($check_import)) {
            // If already imported
            return 'Class Block is already imported!';
        }

        /*
         * Start of Import Excel in Condition
         */
        if(Input::hasFile('students')){
            $path = Input::file('students')->getRealPath();
            $data = Excel::selectSheets('Students')->load($path, function($reader) {
                /*
                 * More Condition to make specific Operations
                 */
            })->get();

            if(!empty($data) && $data->count()){
                foreach ($data as $value) {
                    if($value->lrn != null) {
                        // This will use on users table
                        $insert[] = ['user_id' => $value->lrn, 'firstname' => $value->firstname, 'lastname' => $value->lastname, 'email' => $value->email, 'mobile' => $value->mobile, 'birthday' => date('Y-m-d', strtotime($value->birthday)), 'password' => bcrypt('0000'), 'privilege' => 3, 'status' => 1];
                        // This use on student_infos table
                        $student_info[] = ['student_id' => $value->lrn, 'grade_level' => $grade_level, 'class_block' => $class_block];
                    }
                    
                }
                if(!empty($insert)){
                    DB::table('users')->insert($insert);
                    DB::table('student_infos')->insert($student_info);

                    // Record the the class block is already imported
                    $student_import = new StudentImport();
                    $student_import->grade_level = $grade_level;
                    $student_import->class_block = $class_block;
                    $student_import->save();

                    // User log for importing students
                    $log = new UserLog();
                    $log->user_id = Auth::user()->id;
                    $log->action = 'Imported Students ' . $grade_level . ' - ' . $class_block;
                    $log->save();


                    dd('Students Import Successful.');
                }
                
            }
            else {
                return 'empty response';
            }

        }
        else {
            return 'not imported';
        }
    }


} // End of AdminController Class
