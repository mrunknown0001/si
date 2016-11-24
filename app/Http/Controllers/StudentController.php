<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\StudentLog;
use App\PasswordChange;
use App\Grade;
use App\StudentInfo;
use App\StudentData;

class StudentController extends Controller
{


    public function home()
    {
        return view('students.students-home');
    }
    
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

		if(Auth::attempt(['user_id' => $id, 'password' => $password])) {

			/*
			 * Check if the user is inactive
			 */
			if(Auth::user()->status != 1) {
				Auth::logout();
				return redirect()->route('login')->with('error_msg', 'Your Accout is Inactive! Please Report to Admin.');
			}

			/*
			 * Check if ther user is student
			 * if not the user will not be login
			 */
			if(Auth::user()->privilege != 3) {
				Auth::logout();
				return redirect()->route('login')->with('error_msg', 'Please use this login form.');
			}


			/*
			 * check if student
			 */
			if(Auth::user()->privilege == 3 ) {

				/*
				 * Save students log
				 */
				$students_log = new StudentLog();

				$students_log->student = Auth::user()->id;
				$students_log->action = 'Login to your account';

				$students_log->save();


				$password_change = PasswordChange::where('user_id', Auth::user()->id)->first();

				if(!empty($password_change)) {
					return redirect()->route('students_home');
				}
				else {
					return redirect()->route('students_settings')->with('notice', "You are using default password given by admin, you must change your password immediately.");
				}

				
			}

			// if there is something error
			Auth::logout();
			return redirect()->route('home')->with('error_msg', 'App has encountered error. Please reload this page.');


		}

		// Error Message if student id and/or password is incorrect
		return redirect()->route('home')->with('error_msg', 'Student ID or Password is Incorrect!');

    }


    /*
     * getAllStudentsLog() use to get all log made by student and 
     * pass it in the view
     */
    public function getAllStudentsLog()
    {
    	$logs = StudentLog::where('student', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(15);

    	return view('students.students-log', ['logs' => $logs]);
    
    }


    /*
     * getStudentProfile() use to fetch students profile
     */
    public function getStudentProfile()
    {

    	// get the students profile
    	$profile = User::findorfail(Auth::user()->id);

    	return view('students.students-profile', ['s' => $profile]);
    
    }


    /*
     * showProfileEdit() methods use to update profile of a student, that loads on form
     */
    public function showProfileUpdate()
    {

    	$profile = User::findorfail(Auth::user()->id);

    	return view('students.students-profile-update', ['student' => $profile]);
    
    }


    /*
     * postProfileUpdate() method is used to update profile
     */
    public function postProfileUpdate(Request $request)
    {

    	/*
    	 * input validation
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

    	$student_update = User::findorfail(Auth::user()->id);
    	$student_hashed_password = Auth::user()->password;

    	/*
    	 * Email Address Availability Check
    	 */
    	if($email != Auth::user()->email) {

    		$email_check = User::where('email', $email)->first();

    		if(!empty($email_check)) {

    			return redirect()->route('students_profile_update')->with('error_msg', 'This email: ' . $email . ' is registered with different account, please choose different active email address.');

    		}
    		else {

                // Assign Details to be updated
    			$student_update->firstname = $firstname;
	    		$student_update->lastname = $lastname;
                $student_update->email = $email;
	    		$student_update->mobile = $mobile;
	    		$student_update->birthday = $birthday;

	    		// check if password is correctly typed
	    		if(password_verify($password, $student_hashed_password)) {

	    			$student_update->save();

                    // Student log for updating details
	    			$students_log = new StudentLog();

	    			$students_log->student = Auth::user()->id;
	    			$students_log->action = 'Update Profile';

	    			$students_log->save();

                    // redirect opneration successful
	    			return redirect()->route('students_profile')->with('success', 'Profile Updated Successfully!');

	    		}
	    		else {

                    // redirect if password is incorrect
	    			return redirect()->route('students_profile_update')->with('error_msg', 'Incorrect Password!');
	    		}

	    	}
    	}
    	// if the email entered is same with the current email address of the student, nothing to do with it
    	else {

            // Setting details to be updated
    		$student_update->firstname = $firstname;
    		$student_update->lastname = $lastname;
    		$student_update->mobile = $mobile;
    		$student_update->birthday = $birthday;

    		// check if password is correctly typed
    		if(password_verify($password, $student_hashed_password)) {

    			$student_update->save();


                // Students log for updating details
    			$students_log = new StudentLog();

    			$students_log->student = Auth::user()->id;
    			$students_log->action = 'Update Profile';

    			$students_log->save();


                // redirect operation successful
    			return redirect()->route('students_profile')->with('success', 'Profile Updated Successfully!');

    		}
    		else {

                // redirect is password is incorrect
    			return redirect()->route('students_profile_update')->with('error_msg', 'Incorrect Password!');
    		}

    	}
    
    }


    /*
     * getViewGrades() method is use to view grades
     */
    public function getViewGrades()
    {

        $student = User::find(Auth::user()->id);

        /*
         * Get all Subjects and grade
         */
        $subjects = Grade::distinct()->select('subject_id')
                            ->where('student_id', $student->user_id)
                            ->get();
                            
        $first_quarter_grade = Grade::where('quarter_id', 1)->where('student_id', $student->user_id)->get();
        $second_quarter_grade = Grade::where('quarter_id', 2)->where('student_id', $student->user_id)->get();
        $third_quarter_grade = Grade::where('quarter_id', 3)->where('student_id', $student->user_id)->get();
        $forth_quarter_grade = Grade::where('quarter_id', 4)->where('student_id', $student->user_id)->get();

        // return $third_quarter_grade;

        return view('students.students-view-my-grades', ['subjects' => $subjects, 'first_quarter_grade' => $first_quarter_grade, 'second_quarter_grade' => $second_quarter_grade, 'third_quarter_grade' => $third_quarter_grade, 'forth_quarter_grade' => $forth_quarter_grade]);

    }


    /*
     * viewFullProfileData() use to view full profile data of the students
     */
    public function viewFullProfileData()
    {
        $lrn = Auth::user()->user_id;

        // Find details in users and student_datas
        $student = User::where('user_id', $lrn)->first();

        // Student Data
        $student_d = StudentData::where('student_id', $lrn)->first();

        // Student Info
        $student_info = StudentInfo::where('student_id', $lrn)->first();

        return view('students.students-view-full-profile-data', ['s' => $student, 'd' => $student_d, 'i' => $student_info]);
    }


    /*
     * showEditProfileData() use to modify the current profile data of the students
     */
    public function showEditProfileData()
    {
        $student = User::find(Auth::user()->id);
        $data = StudentData::where('student_id', Auth::user()->user_id)->first();
        $info = StudentInfo::where('student_id', Auth::user()->user_id)->first();

        return view('students.students-show-edit-profile-data', ['s' => $student, 'd' => $data, 'i' => $info]);
    }


    /*
     * postUpdateStudentData() use to update student data
     */
    public function postUpdateStudentData(Request $request)
    {
        /*
         * Input validation on some Data in the form
         */
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'birthday' => 'required',
            'fathers_age' => 'numeric',
            'mothers_age' => 'numeric',
            'guardians_age' => 'numeric',
            'first_sibling_age' => 'numeric',
            'second_sibling_age' => 'numeric',
            'third_sibling_age' => 'numeric',
            'forth_sibling_age' => 'numeric',
            'fifth_sibling_age' => 'numeric'
            ]);


        /*
         * Get all the values from form
         */
        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $birthday = $request['birthday'];

        $sex = $request['sex'];
        $religion = $request['religion'];
        $place_of_birth = $request['place_of_birth'];
        $home_address = $request['home_address'];

        $elem_school = $request['elem_school'];
        $elem_address = $request['elem_school_address'];
        $elem_grad_sy = $request['elem_grad_sy'];

        $hs_school = $request['hs_school'];
        $hs_address = $request['hs_address'];
        $hs_grad_sy = $request['hs_grad_sy'];

        $skill_talent_1 = $request['skill_talent_1'];
        $skill_talent_2 = $request['skill_talent_2'];
        $skill_talent_3 = $request['skill_talent_3'];

        $fathers_name = $request['fathers_name'];
        $fathers_age = $request['fathers_age'];
        $fathers_pob = $request['fathers_place_of_birth'];
        $fathers_home_address = $request['fathers_home_address'];
        $fathers_hea = $request['fathers_highest_educational_attainment'];
        $fathers_occupation = $request['fathers_occupation'];
        $fathers_language = $request['fathers_language'];
        $fathers_religion = $request['fathers_religion'];

        $mothers_name = $request['mothers_name'];
        $mothers_age = $request['mothers_age'];
        $mothers_pob = $request['mothers_place_of_birth'];
        $mothers_home_address = $request['mothers_home_address'];
        $mothers_hea = $request['mothers_highest_educational_attainment'];
        $mothers_occupation = $request['mothers_occupation'];
        $mothers_language = $request['mothers_language'];
        $mothers_religion = $request['mothers_religion'];

        $guardians_name = $request['guardians_name'];
        $guardians_age = $request['guardians_age'];
        $guardians_pob = $request['guardians_place_of_birth'];
        $guardians_home_address = $request['guardians_home_address'];
        $guardians_hea = $request['guardians_highest_educational_attainment'];
        $guardians_occupation = $request['guardians_occupation'];
        $guardians_language = $request['guardians_language'];
        $guardians_religion = $request['guardians_religion'];

        // Siblings
        $sibling1_name = $request['first_sibling_name'];
        $sibling1_age = $request['first_sibling_age'];
        $sibling1_occupation = $request['first_sibling_occupation'];

        $sibling2_name = $request['second_sibling_name'];
        $sibling2_age = $request['second_sibling_age'];
        $sibling2_occupation = $request['second_sibling_occupation'];

        $sibling3_name = $request['third_sibling_name'];
        $sibling3_age = $request['third_sibling_age'];
        $sibling3_occupation = $request['third_sibling_occupation'];

        $sibling4_name = $request['forth_sibling_name'];
        $sibling4_age = $request['forth_sibling_age'];
        $sibling4_occupation = $request['forth_sibling_occupation'];

        $sibling5_name = $request['fifth_sibling_name'];
        $sibling5_age = $request['fifth_sibling_age'];
        $sibling5_occupation = $request['fifth_sibling_occupation'];

        $number_of_romms = $request['number_of_romms'];
        $econ_status = $request['econ_status'];
        $anual_income = $request['anual_income'];
        $income_source = $request['income_source'];

        $subject_like_most1 = $request['subject_most_1'];
        $subject_like_most2 = $request['subject_most_2'];
        $subject_like_most3 = $request['subject_most_3'];

        $subject_like_least1 = $request['subject_least_1'];
        $subject_like_least2 = $request['subject_least_2'];
        $subject_like_least3 = $request['subject_least_3'];

        $special_activities = $request['special_activities'];

        $hobby1 = $request['hobbies1'];
        $hobby2 = $request['hobbies2'];
        $hobby3 = $request['hobbies3'];

        $first_year_achievement = $request['first_year_achievement'];
        $second_year_achievement = $request['second_year_achievement'];
        $third_year_achievement = $request['third_year_achievement'];
        $forth_year_achievement = $request['forth_year_achievement'];

        /*
         * Find Student in users and student_datas table
         */
        $student = User::find(Auth::user()->id);

        $s_data = StudentData::where('student_id', Auth::user()->user_id)->first();

        /*
         * Setting and Saving Changes
         */
        $student->firstname  = $firstname;
        $student->lastname = $lastname;
        $student->birthday = date('Y-m-d', strtotime($birthday));

        $s_data->sex = $sex;
        $s_data->religion = $religion;
        $s_data->home_address = $home_address;
        $s_data->place_of_birth = $place_of_birth;

        $s_data->elem_school = $elem_school;
        $s_data->elem_address = $elem_address;
        $s_data->elem_grad_sy = $elem_grad_sy;

        $s_data->hs_school = $hs_school;
        $s_data->hs_address = $hs_address;
        $s_data->hs_grad_sy = $hs_grad_sy;

        $s_data->skill_talent_1 = $skill_talent_1;
        $s_data->skill_talent_2 = $skill_talent_2;
        $s_data->skill_talent_3 = $skill_talent_3;

        $s_data->fathers_name = $fathers_name;
        $s_data->fathers_age = $fathers_age;
        $s_data->fathers_pob = $fathers_pob;
        $s_data->fathers_home_address = $fathers_home_address;
        $s_data->fathers_hea = $fathers_hea;
        $s_data->fathers_occupation = $fathers_occupation;
        $s_data->fathers_language = $fathers_language;
        $s_data->fathers_religion = $fathers_religion;

        $s_data->mothers_name = $mothers_name;
        $s_data->mothers_age = $mothers_age;
        $s_data->mothers_pob = $mothers_pob;
        $s_data->mothers_home_address = $mothers_home_address;
        $s_data->mothers_hea = $mothers_hea;
        $s_data->mothers_occupation = $mothers_occupation;
        $s_data->mothers_language = $mothers_language;
        $s_data->mothers_religion = $mothers_religion;

        $s_data->guardians_name = $guardians_name;
        $s_data->guardians_age = $guardians_age;
        $s_data->guardians_pob = $guardians_pob;
        $s_data->guardians_home_address = $guardians_home_address;
        $s_data->guardians_hea = $guardians_hea;
        $s_data->guardians_occupation = $guardians_occupation;
        $s_data->guardians_language = $guardians_language;
        $s_data->guardians_religion = $guardians_religion;

        $s_data->sibling1_name = $sibling1_name;
        $s_data->sibling1_age = $sibling1_age;
        $s_data->sibling1_occupation = $sibling1_occupation;

        $s_data->sibling2_name = $sibling2_name;
        $s_data->sibling2_age = $sibling2_age;
        $s_data->sibling2_occupation = $sibling2_occupation;

        $s_data->sibling3_name = $sibling3_name;
        $s_data->sibling3_age = $sibling3_age;
        $s_data->sibling3_occupation = $sibling3_occupation;

        $s_data->sibling4_name = $sibling4_name;
        $s_data->sibling4_age = $sibling4_age;
        $s_data->sibling4_occupation = $sibling4_occupation;

        $s_data->sibling5_name = $sibling5_name;
        $s_data->sibling5_age = $sibling5_age;
        $s_data->sibling5_occupation = $sibling5_occupation;

        $s_data->number_of_romms = $number_of_romms;
        $s_data->econ_status = $econ_status;
        $s_data->anual_income = $anual_income;
        $s_data->source_of_income = $income_source;

        $s_data->subject_like_1 = $subject_like_most1;
        $s_data->subject_like_2 = $subject_like_most2;
        $s_data->subject_like_3 = $subject_like_most3;

        $s_data->subject_least_1 = $subject_like_least1;
        $s_data->subject_least_2 = $subject_like_least2;
        $s_data->subject_least_3 = $subject_like_least3;

        $s_data->special_activities = $special_activities;

        $s_data->hobbies1 = $hobby1;
        $s_data->hobbies2 = $hobby2;
        $s_data->hobbies3 = $hobby3;

        if($student->save() && $s_data->save()) {
            // Add student log
            $log = new StudentLog();
            $log->student = Auth::user()->id;
            $log->action = 'Updated My Information';
            $log->save();

            // return 'Data Successfully Saved!';
            return redirect()->route('students_show_edit_profile_data')->with('success','Data Successfully Updated!');
        }

        // return 'Whoops There is something wrong!';
        return redirect()->route('students_show_edit_profile_data')->with('error_msg', 'Whoops there is something wrong. Please try again later or double check your data');

    }

}
