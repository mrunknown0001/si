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
                <form action="#" method="POST">
                    <h4>I. Personal Data</h4>
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <input type="text" name="firstname" value="{{ $s->firstname }}" class="form-control" placeholder="First Name" />
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="lastname" value="{{ $s->lastname }}" class="form-control" placeholder="Last Name" />
                            </div>
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <select name="sex" id="sex" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Femail">Female</option>
                            </select>
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="birthday" value="{{ date('m/d/Y', strtotime($s->birthday)) }}" class="form-control" placeholder="Birthdate mm/dd/yyyy" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="religion" value="{{ $d->religion }}" class="form-control" placeholder="Religion" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="place_of_birth" value="{{ $d->place_of_birth }}" class="form-control" placeholder="Place of Birth" />
                        </div>
                        <div class="form-group" style="width: 50%">
                            <input type="text" name="home_address" value="{{ $d->home_address }}" class="form-control" placeholder="Home Address" />
                        </div>
                        <div class="form-group">
                            Course, Year &amp; Section: <strong><u>{{ $d->course }} / {{ $i->grade->title }} / {{ $i->block->name }}</u></strong>
                        </div>
                        <div class="form-group">
                            <h5><strong>Education</strong></h5>
                            <div class="row">
                                <div class="col-md-12"><strong>Elementary</strong></div>
                                <div class="col-md-5">
                                    <input type="text" name="elem_school" value="{{ $d->elem_school }}" class="form-control" placeholder="Elementary School Name" />
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="elem_school_address" value="{{ $d->elem_address }}" class="form-control" placeholder="Elementary School Address" />
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="elem_grad_sy" value="{{ $d->elem_grad_sy }}" class="form-control" placeholder="Elementary Graduated School Year" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><strong>High School</strong></div>
                                <div class="col-md-5">
                                    <input type="text" name="hs_school" value="{{ $d->hs_school }}" class="form-control" placeholder="High School Name" />
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="hs_address" value="{{ $d->hs_address }}" class="form-control" placeholder="High School Address" />
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="hs_grad_sy" value="{{ $d->hs_grad_sy }}" class="form-control" placeholder="High School Graduated Year" />

                                </div>
                            </div>
                        </div>
                        <h5><strong>Special Skill/Talent</strong></h5>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="skill_talent_1" value="{{ $d->skill_talent_1 }}" class="form-control" placeholder="Skill/Talent" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="skill_talent_2" value="{{ $d->skill_talent_2 }}" class="form-control" placeholder="Skill/Talent" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="skill_talent_3" value="{{ $d->skill_talent_3 }}" class="form-control" placeholder="Skill/Talent" />
                        </div>
                        <hr/>
                        <h4>II. Familiy/Cultural Background Data</h4>
                        <strong>Father's Info</strong>
                        
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="fathers_name" value="{{ $d->fathers_name }}" class="form-control" placeholder="Father's Firstname" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="fathers_age" value="{{ $d->fathers_age }}" class="form-control" placeholder="Father's Age" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="fathers_place_of_birth" value="{{ $d->fathers_pob }}" class="form-control" placeholder="Father's Place of Birth" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="fathers_home_address" value="{{ $d->fathers_home_address }}" class="form-control" placeholder="Father's Home Address" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="fathers_highest_educational_attainment" value="{{ $d->fathers_hea }}" class="form-control" placeholder="Father's Highest Educational Attainment" />
                        </div>

                        <strong>Mothers's Info</strong>
                        
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="mothers_name" value="{{ $d->mothers_name }}" class="form-control" placeholder="Mother's Firstname" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="mothers_age" value="{{ $d->mothers_age }}" class="form-control" placeholder="Mothers's Age" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="mothers_place_of_birth" value="{{ $d->mothers_pob }}" class="form-control" placeholder="Mother's Place of Birth" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="mothers_home_address" value="{{ $d->mothers_home_address }}" class="form-control" placeholder="Mother's Home Address" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="mothers_highest_educational_attainment" value="{{ $d->mothers_hea }}" class="form-control" placeholder="Mother's Highest Educational Attainment" />
                        </div>

                        <strong>Guardian's Info</strong>
                        
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="guardians_name" value="{{ $d->guardians_name }}" class="form-control" placeholder="Guardian's Firstname" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="guardians_age" value="{{ $d->guardians_age }}" class="form-control" placeholder="Guardian's Age" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="guardians_place_of_birth" value="{{ $d->guardians_pob }}" class="form-control" placeholder="Guardian's Place of Birth" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="guardians_home_address" value="{{ $d->guardians_home_address }}" class="form-control" placeholder="Guardian's Home Address" />
                        </div>
                        <div class="form-group" style="width: 50%;">
                            <input type="text" name="guardians_highest_educational_attainment" value="{{ $d->guardians_hea }}" class="form-control" placeholder="Guardian's Highest Educational Attainment" />
                        </div>

                        <strong>Siblings</strong>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="first_sibling_name" value="" class="form-control" placeholder="First Sibling Name" />
                                </div>
                                <div class="col-lg-2">
                                    <input type="text" name="first_sibling_age" value="" class="form-control" placeholder="Age" />
                                </div>
                                <div class="col-lg-2">
                                    <input type="text" name="first_sibling_occupation" value="" class="form-control" placeholder="Occupation" />
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            
                        </div>
                        <div class="form-group">
                            
                        </div>
                        <div class="form-group">
                            
                        </div>
                        <div class="form-group">
                            
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