@extends('layouts.app')

@section('title') Edit Profile Data - Student Information System @endsection

@section('content')
{{-- Include Student Menu --}}
@include('students.students-menu')
<div class="container-fluid">
    
    <div class="page-wrapper">
    	<div class="row">
    		<div class="col-lg-8 col-md-12 col-lg-offset-2">
    			{{-- Includes errors and session flash message display container --}}
		    	@include('includes.errors')
		    	@include('includes.error')
		    	@include('includes.success')
		    	@include('includes.notice')

		    	<h3>Edit Full Profile Data</h3>
                <hr/>
                <form action="{{ route('students_post_update_data') }}" method="POST">
                    <h4>I. Personal Data</h4>
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <input type="text" name="firstname" value="{{ $s->firstname }}" class="form-control text-capitalize" placeholder="First Name" />
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="lastname" value="{{ $s->lastname }}" class="form-control text-capitalize" placeholder="Last Name" />
                            </div>
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <select name="sex" id="sex" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="birthday" value="{{ date('m/d/Y', strtotime($s->birthday)) }}" class="form-control" placeholder="Birthdate mm/dd/yyyy" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="religion" value="{{ $d->religion }}" class="form-control text-capitalize" placeholder="Religion" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="place_of_birth" value="{{ $d->place_of_birth }}" class="form-control text-capitalize" placeholder="Place of Birth" />
                        </div>
                        <div class="form-group" style="width: 50%">
                            <input type="address" name="home_address" value="{{ $d->home_address }}" class="form-control" placeholder="Home Address" />
                        </div>
                        <div class="form-group">
                            Course, Year &amp; Section: <strong><u>{{ $d->course }} / {{ $i->grade->title }} / {{ $i->block->name }}</u></strong>
                        </div>
                        <div class="form-group">
                            <h5><strong>Education</strong></h5>
                            <div class="row">
                                <div class="col-md-12"><strong>Elementary</strong></div>
                                <div class="col-md-5">
                                    <input type="text" name="elem_school" value="{{ $d->elem_school }}" class="form-control text-capitalize" placeholder="Elementary School Name" />
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="elem_school_address" value="{{ $d->elem_address }}" class="form-control text-capitalize" placeholder="Elementary School Address" />
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="elem_grad_sy" value="{{ $d->elem_grad_sy }}" class="form-control" placeholder="Elementary Graduated School Year" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><strong>High School</strong></div>
                                <div class="col-md-5">
                                    <input type="text" name="hs_school" value="{{ $d->hs_school }}" class="form-control text-capitalize" placeholder="High School Name" />
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="hs_address" value="{{ $d->hs_address }}" class="form-control text-capitalize" placeholder="High School Address" />
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="hs_grad_sy" value="{{ $d->hs_grad_sy }}" class="form-control" placeholder="High School Graduated Year" />

                                </div>
                            </div>
                        </div>
                        <h5><strong>Special Skill/Talent</strong></h5>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="skill_talent_1" value="{{ $d->skill_talent_1 }}" class="form-control text-capitalize" placeholder="Skill/Talent" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="skill_talent_2" value="{{ $d->skill_talent_2 }}" class="form-control text-capitalize" placeholder="Skill/Talent" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="skill_talent_3" value="{{ $d->skill_talent_3 }}" class="form-control text-capitalize" placeholder="Skill/Talent" />
                        </div>
                        <hr/>
                        <h4>II. Familiy/Cultural Background Data</h4>
                        <strong>Father's Info</strong>
                        
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="fathers_name" value="{{ $d->fathers_name }}" class="form-control text-capitalize" placeholder="Father's Firstname" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="number" name="fathers_age" value="{{ $d->fathers_age }}" class="form-control" placeholder="Father's Age" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="fathers_place_of_birth" value="{{ $d->fathers_pob }}" class="form-control text-capitalize" placeholder="Father's Place of Birth" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="fathers_home_address" value="{{ $d->fathers_home_address }}" class="form-control text-capitalize" placeholder="Father's Home Address" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="fathers_highest_educational_attainment" value="{{ $d->fathers_hea }}" class="form-control text-capitalize" placeholder="Father's Highest Educational Attainment" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="fathers_occupation" value="{{ $d->fathers_occupation }}" class="form-control text-capitalize" placeholder="Father's Occupation" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="fathers_language" value="{{ $d->fathers_language }}" class="form-control text-capitalize" placeholder="Father's Language" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="fathers_religion" value="{{ $d->fathers_religion }}" class="form-control text-capitalize" placeholder="Father's Religion" />
                        </div>

                        <strong>Mothers's Info</strong>
                        
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="mothers_name" value="{{ $d->mothers_name }}" class="form-control text-capitalize" placeholder="Mother's Firstname" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="number" name="mothers_age" value="{{ $d->mothers_age }}" class="form-control" placeholder="Mothers's Age" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="mothers_place_of_birth" value="{{ $d->mothers_pob }}" class="form-control text-capitalize" placeholder="Mother's Place of Birth" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="mothers_home_address" value="{{ $d->mothers_home_address }}" class="form-control text-capitalize" placeholder="Mother's Home Address" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="mothers_highest_educational_attainment" value="{{ $d->mothers_hea }}" class="form-control text-capitalize" placeholder="Mother's Highest Educational Attainment" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="mothers_occupation" value="{{ $d->mothers_occupation }}" class="form-contro text-capitalizel" placeholder="Mother's Occupation" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="mothers_language" value="{{ $d->mothers_language }}" class="form-control text-capitalize" placeholder="Mother's Language" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="mothers_religion" value="{{ $d->mothers_religion }}" class="form-control text-capitalize" placeholder="Mother's Religion" />
                        </div>

                        <strong>Guardian's Info</strong>
                        
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="guardians_name" value="{{ $d->guardians_name }}" class="form-control text-capitalize" placeholder="Guardian's Firstname" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="number" name="guardians_age" value="{{ $d->guardians_age }}" class="form-control" placeholder="Guardian's Age" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="guardians_place_of_birth" value="{{ $d->guardians_pob }}" class="form-control text-capitalize" placeholder="Guardian's Place of Birth" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="guardians_home_address" value="{{ $d->guardians_home_address }}" class="form-control text-capitalize" placeholder="Guardian's Home Address" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="guardians_highest_educational_attainment" value="{{ $d->guardians_hea }}" class="form-control text-capitalize" placeholder="Guardian's Highest Educational Attainment" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="guardians_occupation" value="{{ $d->guardians_occupation }}" class="form-control text-capitalize" placeholder="Guardian's Occupation" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="guardians_language" value="{{ $d->guardians_language }}" class="form-control text-capitalize" placeholder="Guardian's Language" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="guardians_religion" value="{{ $d->guardians_religion }}" class="form-control text-capitalize" placeholder="Guardian's Religion" />
                        </div>

                        <strong>Siblings</strong>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="first_sibling_name" value="{{ $d->sibling1_name }}" class="form-control text-capitalize" placeholder="First Sibling Name" />
                                </div>
                                <div class="col-lg-2">
                                    <input type="number" name="first_sibling_age" value="{{ $d->sibling1_age }}" class="form-control" placeholder="Age" />
                                </div>
                                <div class="col-lg-2">
                                    <input type="text" name="first_sibling_occupation" value="{{ $d->sibling1_occupation }}" class="form-control text-capitalize" placeholder="Occupation" />
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="second_sibling_name" value="{{ $d->sibling2_name }}" class="form-control text-capitalize" placeholder="Second Sibling Name" />
                                </div>
                                <div class="col-lg-2">
                                    <input type="number" name="second_sibling_age" value="{{ $d->sibling2_age }}" class="form-control" placeholder="Age" />
                                </div>
                                <div class="col-lg-2">
                                    <input type="text" name="second_sibling_occupation" value="{{ $d->sibling2_occupation }}" class="form-control text-capitalize" placeholder="Occupation" />
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="third_sibling_name" value="{{ $d->sibling3_name }}" class="form-control text-capitalize" placeholder="Third Sibling Name" />
                                </div>
                                <div class="col-lg-2">
                                    <input type="number" name="third_sibling_age" value="{{ $d->sibling3_age }}" class="form-control" placeholder="Age" />
                                </div>
                                <div class="col-lg-2">
                                    <input type="text" name="third_sibling_occupation" value="{{ $d->sibling3_occupation }}" class="form-control text-capitalize" placeholder="Occupation" />
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="forth_sibling_name" value="{{ $d->sibling4_name }}" class="form-control text-capitalize" placeholder="Forth Sibling Name" />
                                </div>
                                <div class="col-lg-2">
                                    <input type="number" name="forth_sibling_age" value="{{ $d->sibling4_age }}" class="form-control" placeholder="Age" />
                                </div>
                                <div class="col-lg-2">
                                    <input type="text" name="forth_sibling_occupation" value="{{ $d->sibling4_occupation }}" class="form-control text-capitalize" placeholder="Occupation" />
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="fifth_sibling_name" value="{{ $d->sibling5_name }}" class="form-control text-capitalize" placeholder="Fifth Sibling Name" />
                                </div>
                                <div class="col-lg-2">
                                    <input type="number" name="fifth_sibling_age" value="{{ $d->sibling5_age }}" class="form-control" placeholder="Age" />
                                </div>
                                <div class="col-lg-2">
                                    <input type="text" name="fifth_sibling_occupation" value="{{ $d->sibling5_occupation }}" class="form-control text-capitalize" placeholder="Occupation" />
                                </div>
                            </div>
                            
                        </div>
                        <hr/>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="number_of_romms" value="{{ $d->number_of_romms }}" class="form-control" placeholder="Number of Rooms in the House" />
                        </div>

                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="econ_status" value="{{ $d->econ_status }}" class="form-control" placeholder="Economic Status of the Family" />
                        </div>

                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="anual_income" value="{{ $d->anual_income }}" class="form-control" placeholder="Average Gross Anual Income" />
                        </div>

                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="income_source" value="{{ $d->source_of_income }}" class="form-control" placeholder="Source of Income" />
                        </div>
                        
                        <h4>III. Interest, Activities and Recreation</h4>

                        <h5>Subject You Like Most</h5>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="subject_most_1" value="{{ $d->subject_like_1 }}" class="form-control text-capitalize" placeholder="Subject 1" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="subject_most_2" value="{{ $d->subject_like_2 }}" class="form-control text-capitalize" placeholder="Subject 3" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="subject_most_3" value="{{ $d->subject_like_3 }}" class="form-control text-capitalize" placeholder="Subject 3" />
                        </div>

                        <h5>Subject You Like Least</h5>

                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="subject_least_1" value="{{ $d->subject_least_1 }}" class="form-control text-capitalize" placeholder="Subject 1" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="subject_least_2" value="{{ $d->subject_least_2 }}" class="form-control text-capitalize" placeholder="Subject 3" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="subject_least_3" value="{{ $d->subject_least_3 }}" class="form-control text-capitalize" placeholder="Subject 3" />
                        </div>
                        <hr/>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="special_activities" value="{{ $d->special_activities }}" class="form-control text-capitalize" placeholder="Specific Activity of Interest which you desire to participate in" />
                        </div>

                        <div class="form-group" style="width: 50%;">
                            <h5>Hobbies</h5>
                            <div class="form-group">
                                <input type="text" name="hobbies1" value="{{ $d->hobbies1 }}" class="form-control text-capitalize" placeholder="Hobby 1" />
                            </div>

                            <div class="form-group">
                                <input type="text" name="hobbies2" value="{{ $d->hobbies2 }}" class="form-control text-capitalize" placeholder="Hobby 2" />
                            </div>

                            <div class="form-group">
                                <input type="text" name="hobbies3" value="{{ $d->hobbies3 }}" class="form-control text-capitalize" placeholder="Hobby 3" />
                            </div>

                        </div>

                        <h4>IV. Activies-Achievement Data</h4>

                        <h5>Activities in Different Year Level: High School</h5>

                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="first_year_achievement" value="{{ $d->aa_data1 }}" class="form-control text-capitalize" placeholder="First Year Achievement" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="second_year_achievement" value="{{ $d->aa_data2 }}" class="form-control text-capitalize" placeholder="Second Year Achievement" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="third_year_achievement" value="{{ $d->aa_data3 }}" class="form-control text-capitalize" placeholder="Thrid Year Achievement" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="forth_year_achievement" value="{{ $d->aa_data4 }}" class="form-control text-capitalize" placeholder="Forth Year Achievement" />
                        </div>

                        <div class="form-group" style="width: 50%;">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <button class="btn btn-primary">Update My Data</button>
                        </div>

                </form>
    		</div>
    	</div>
    	
    </div>

</div>
@endsection