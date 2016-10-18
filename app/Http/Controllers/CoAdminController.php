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
use App\BlockAssign;
use App\SchoolYear;
use App\QuarterSelect;
use App\StudentInfo;
use App\Grade;
use App\GradeImport;

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

        /*
         * Input Validation
         */
        $this->validate($request, [
            'students' => 'required',
            'subject' => 'required'
            ]);

        // Assign Values to Variables
        $subject = $request['subject'];

        // Block Assignment of the Adviser
        $block = BlockAssign::where('co_admin', Auth::user()->id)->first();

        // Get selected quarter
        $quarter = QuarterSelect::where('status', 1)->first();
        // Check if there is a quarter selected
        if(empty($quarter)) {
            return 'No Selected Quarter. Report to Admin';
        }

        // Get school Year
        $school_year = SchoolYear::where('status', 1)->first();
        // Check if there is a school year selected
        if(empty($school_year)) {
            return 'No Selected School Year. Report to Admin';
        }


        /*
         * Check subject for this class if already imported
         */
        $check_subject_import = GradeImport::where('subject_id', $subject)
                                        ->where('block_id', $block->block)
                                        ->where('grade_level_id', $block->level)
                                        ->where('quarter_id', $quarter->id)
                                        ->where('school_year_id', $school_year->id)
                                        ->first();

        if(!empty($check_subject_import)) {
            return 'Subject is already imported for this block, quarter and school year.';
        }

        /*
         * Start of Importing grades
         */
        if(Input::hasFile('students')){
            $path = Input::file('students')->getRealPath();
            $data = Excel::selectSheetsByIndex(0)->load($path, function($reader) {
                /*
                 * More Condition to make specific Operations
                 */
            })->get();

            if(!empty($data) && $data->count()){
                foreach ($data as $value) {
                    if($value->lrn != null) {
                        
                        $grade[] = ['student_id' => $value->lrn, 'grade' => $value->grade ,'subject_id' => $subject, 'block_id' => $block->block, 'grade_level_id' => $block->level, 'quarter_id' => $quarter->id, 'school_year_id' => $school_year->id];
                        
                    }
                    
                }
                if(!empty($grade)){
                    DB::table('grades')->insert($grade);

                    // Grade Import Log
                    $gim = new GradeImport();
                    $gim->subject_id = $subject;
                    $gim->block_id = $block->block;
                    $gim->grade_level_id = $block->level;
                    $gim->quarter_id = $quarter->id;
                    $gim->school_year_id = $school_year->id;
                    $gim->save();

                    // User log for importing students
                    $log = new UserLog();
                    $log->user_id = Auth::user()->id;
                    $log->action = 'Import Grades';
                    $log->save();


                    dd('Grades Import Successful.');
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


    /*
     * getImportedSubjects() method is use to get imported subjects to be display in view
     */
    public function getImportedSubjects()
    {

        $fq = GradeImport::where('quarter_id', 1)->get();
        $sq = GradeImport::where('quarter_id', 2)->get();
        $tq = GradeImport::where('quarter_id', 3)->get();
        $foq = GradeImport::where('quarter_id', 4)->get();


        return view('coadmin.co-admin-import-grades', ['first_quarter' => $fq, 'second_quarter' => $sq, 'third_quarter' => $tq, 'forth_quarter' => $foq]);
    }

}
