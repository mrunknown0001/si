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
use App\GradeLevel;
use App\ClassBlock;
use App\Subject;

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

        
        /*
         * Unknown Notice/Error
         * Added Suppressor @
         */
        @$students = StudentInfo::where('grade_level', $gblock->level)
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
            return redirect()->route('co_admin_post_import_grades')->with('error_msg', 'No Selected Quarter. Report to Admin');
        }

        // Get school Year
        $school_year = SchoolYear::where('status', 1)->first();
        // Check if there is a school year selected
        if(empty($school_year)) {
            return redirect()->route('co_admin_post_import_grades')->with('error_msg', 'No Selected School Year. Report to Admin');
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
            return redirect()->route('co_admin_post_import_grades')->with('error_msg', 'Subject is already imported for this block, quarter and school year.');
        }

        /*
         * Start of Importing grades
         */
        if(Input::hasFile('students')){
            $path = Input::file('students')->getRealPath();
            $data = Excel::selectSheetsByIndex($quarter->id)->load($path, function($reader) {
                /*
                 * More Condition to make specific Operations
                 */
            })->get();

            if(!empty($data) && $data->count()){
                foreach ($data as $value) {
                    if($value->lrn != null) {
                        
                        $grade[] = ['student_id' => $value->lrn, 
                                'w1' => $value->w1,
                                'w2' => $value->w2,
                                'w3' => $value->w3,
                                'w4' => $value->w4,
                                'w5' => $value->w5,
                                'w6' => $value->w6,
                                'w7' => $value->w7,
                                'w8' => $value->w8,
                                'w9' => $value->w9,
                                'w10' => $value->w10,
                                'wtotal' => $value->wtotal,
                                'wps' => $value->wps,
                                'wws' => $value->wws,
                                'grade' => $value->qg,
                                'p1' => $value->p1,
                                'p2' => $value->p2,
                                'p3' => $value->p3,
                                'p4' => $value->p4,
                                'p5' => $value->p5,
                                'p6' => $value->p6,
                                'p7' => $value->p7,
                                'p8' => $value->p8,
                                'p9' => $value->p9,
                                'p10' => $value->p10,
                                'ptotal' => $value->ptotal,
                                'pps' => $value->pps,
                                'pws' => $value->pws,
                                'q' => $value->q,
                                'qps' => $value->qps,
                                'qws' => $value->qws,
                                'initial' => $value->initial,
                                'grade' => $value->qg,
                                'subject_id' => $subject, 'block_id' => $block->block, 'grade_level_id' => $block->level, 'quarter_id' => $quarter->id, 'school_year_id' => $school_year->id];
                        
                    }
                    
                }

                // return $grade;
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


                    return redirect()->route('co_admin_post_import_grades')->with('success', 'Grades Imported Successfully');
                }
                
            }
            else {
               return redirect()->route('co_admin_post_import_grades')->with('error_msg', 'Error. Empy Responce. Please go to Home Page');
            }

        }
        else {
            return redirect()->route('co_admin_post_import_grades')->with('error_msg', 'Grades Not Imported!');
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


    /*
     * getExportView() use to view export page
     */
    public function getExportView()
    {
        $level = GradeLevel::all();
        $class_block = ClassBlock::all();
        $subject = Subject::all();
        $year = SchoolYear::where('status', 1)->first();

        return view('coadmin.co-admin-grade-export', ['levels' => $level, 'class_block' => $class_block, 'subjects' => $subject, 'year' => $year]);
    }


    /*
     * postExportGrade() use to export grades
     */

    public function postExportGrade(Request $request)
    {

        /*
         * Input validation
         */
        $this->validate($request, [
            'level' => 'required',
            'block' => 'required',
            'subject' => 'required',
            'quarter' => 'required'
            ]);


        // Assign values to vaariables
        $level = $request['level'];
        $block = $request['block'];
        $subject = $request['subject'];
        $quarter = $request['quarter'];

        // Current School Year
        $sy = SchoolYear::where('status', 1)->first();

        /*
         * Find in import record
         */
        $import_rec = GradeImport::where('school_year_id', $sy->id)
                            ->where('grade_level_id', $level)
                            ->where('block_id', $block)
                            ->where('subject_id', $subject)
                            ->where('quarter_id', $quarter)
                            ->first();

        // This Will return if there is no match in the database
        if(empty($import_rec)) {
            return redirect()->route('admin_export_grade')->with('error_msg', 'No Imported Grade or Block not exists in the Grade Level.');
        }

        // Create Filename of the excel file to be export
        $gl = GradeLevel::find($level);
        $cb = ClassBlock::find($block);
        $subj = Subject::find($subject);
        $quar = QuarterSelect::find($quarter);

        // This is the file name of the file that will be exported
        $filename = $subj->title . ' - ' . $gl->title . '-' . $cb->name . ' ' . strtoupper($quar->code) . ' Quarter ' . $sy->from . '-' . $sy->to;


        // Select specific Grades in grades table
        $student_grades = Grade::where('school_year_id', $sy->id)
                            ->where('grade_level_id', $level)
                            ->where('block_id', $block)
                            ->where('subject_id', $subject)
                            ->where('quarter_id', $quarter)
                            ->get();

        foreach($student_grades as $sg) {
            $data[] = [
                'LRN' => $sg->student_id,
                'LastName' => $sg->student->lastname,
                'FirstName' => $sg->student->firstname,
                'W1' => $sg->w1,
                'W2' => $sg->w2,
                'W3' => $sg->w3,
                'W4' => $sg->w4,
                'W5' => $sg->w5,
                'W6' => $sg->w6,
                'W7' => $sg->w7,
                'W8' => $sg->w8,
                'W9' => $sg->w9,
                'W10' => $sg->w10,
                'WTotal' => $sg->wtotal,
                'WPS' => $sg->wps,
                'WWS' => $sg->wws,
                'P1' => $sg->p1,
                'P2' => $sg->p2,
                'P3' => $sg->p3,
                'P4' => $sg->p4,
                'P5' => $sg->p5,
                'P6' => $sg->p6,
                'P7' => $sg->p7,
                'P8' => $sg->p8,
                'P9' => $sg->p9,
                'P10' => $sg->p10,
                'PTotal' => $sg->ptotal,
                'PPS' => $sg->pps,
                'PWS' => $sg->pws,
                'Q' => $sg->q,
                'QPS' => $sg->qps,
                'QWS' => $sg->qws,
                'Initial' => $sg->initial,
                'Grade' => $sg->grade
                ];
        }

        return Excel::create($filename, function($excel) use ($data) {
            $excel->sheet('Grades', function($sheet) use ($data)
            {
                $sheet->setBorder('A1:AH101', 'thin');

                $sheet->cells('A1:AH1', function ($cells) {
                    $cells->setValignment('center');
                    $cells->setAlignment('center');
                    $cells->setFontWeight('bold');
                });

                $sheet->cell('A2:AH101', function ($cells) {
                    $cells->setValignment('center');
                    $cells->setAlignment('center');
                });

                $sheet->fromArray($data);
            });
        })->download('xlsx');
    }

}
