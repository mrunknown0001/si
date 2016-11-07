@extends('layouts.app')

@section('title') Students Panel - Student Information System @endsection

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

		    	<h3>Full Profile Data <a href="{{ route('students_show_edit_profile_data') }}"><i class="fa fa-pencil"></i></a></h3>
                <hr/>
                <h4>I. Perosonal Data</h4>
                <ol type="1">
                    <li>Name: <strong><u>{{ $s->firstname }} {{ $s->lastname }}</u></strong></li>
                    <li>Sex: <strong><u>{{ $d->sex }}</u></strong></li>
                    <li>Date of Birth: <strong><u>{{ date('F j, Y', strtotime($s->birthday)) }}</u></strong></li>
                    <li>Religion: <strong><u>{{ $d->religion }}</u></strong></li>
                    <li>Place of Birth: <strong><u>{{ $d->place_of_birth }}</u></strong></li>
                    <li>Home Address: <strong><u>{{ $d->home_address }}</u></strong></li>
                    <li>Course, Yr and Section: <strong><u>{{ $d->course }} / {{ $i->grade->code }} / {{ $i->block->name }}</u></strong></li>
                    <li>Education
                        <ol type="a">
                            <li>
                                <strong><u>
                                {{ $d->elem_school }} /
                                {{ $d->elem_address }} / 
                                {{ $d->elem_grad_sy }}
                                </u></strong>
                                <br/>
                                <i>(Elementary School / Address / SY Completed)</i>
                            </li>
                            <li>
                                <strong>
                                <u>
                                    {{ $d->hs_school }} / 
                                    {{ $d->hs_address }} / 
                                    {{ $d->hs_grad_sy }}
                                </u>
                                </strong>
                                <br/>
                                <i>(High School School / Address / SY Completed)</i>
                            </li>
                        </ol>
                    </li>
                    <li>Special Skill/Talent
                        <ol>
                            <li>Skills/Talent: <strong><u>{{ $d->skill_talent_1 }}</u></strong></li>
                            <li>Skills/Talent: <strong><u>{{ $d->skill_talent_2 }}</u></strong></li>
                            <li>Skills/Talent: <strong><u>{{ $d->skill_talent_3 }}</u></strong></li>
                        </ol>
                    </li>
                </ol>
                <h4>II. Family/Cultural Background Data</h4>
                <ol type="1">
                    <li>
                        <ul>
                            <li>Father's Name: <strong><u>{{ $d->fathers_name }}</u></strong></li> 
                            <li>Age: <strong><u>{{ $d->fathers_age }}</u></strong></li>
                            <li>Place of Birth: <strong><u>{{ $d->fathers_pob }}</u></strong></li>
                            <li>Home Address: <strong><u>{{ $d->fathers_home_address }}</u></strong></li>
                            <li>Highest Educational Attainment: <strong><u>{{ $d->fathers_hea }}</u></strong></li>
                            <li>Occupation: <strong><u>{{ $d->fathers_occupation }}</u></strong></li>
                            <li>Language Spoken: <strong><u>{{ $d->fathers_language }}</u></strong></li>
                            <li>Religion: <strong><u>{{ $d->fathers_religion }}</u></strong></li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Mothers's Name: <strong><u>{{ $d->mothers_name }}</u></strong></li> 
                            <li>Age: <strong><u>{{ $d->mothers_age }}</u></strong></li>
                            <li>Place of Birth: <strong><u>{{ $d->mothers_pob }}</u></strong></li>
                            <li>Home Address: <strong><u>{{ $d->mothers_home_address }}</u></strong></li>
                            <li>Highest Educational Attainment: <strong><u>{{ $d->mothers_hea }}</u></strong></li>
                            <li>Occupation: <strong><u>{{ $d->mothers_occupation }}</u></strong></li>
                            <li>Language Spoken: <strong><u>{{ $d->mothers_language }}</u></strong></li>
                            <li>Religion: <strong><u>{{ $d->mothers_religion }}</u></strong></li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Guardian's Name: <strong><u>{{ $d->guardians_name }}</u></strong></li> 
                            <li>Age: <strong><u>{{ $d->guardians_age }}</u></strong></li>
                            <li>Place of Birth: <strong><u>{{ $d->guardians_pob }}</u></strong></li>
                            <li>Home Address: <strong><u>{{ $d->guardians_home_address }}</u></strong></li>
                            <li>Highest Educational Attainment: <strong><u>{{ $d->guardians_hea }}</u></strong></li>
                            <li>Occupation: <strong><u>{{ $d->guardians_occupation }}</u></strong></li>
                            <li>Language Spoken: <strong><u>{{ $d->guardians_language }}</u></strong></li>
                            <li>Religion: <strong><u>{{ $d->guardians_religion }}</u></strong></li>
                        </ul>
                    </li>
                    <li>
                        Siblings
                        <ul>
                            <li>Name / Age / Accupation</li>
                            <li>
                                <strong>
                                    <u>
                                    @if(!empty($d->sibling1_name))
                                        {{ $d->sibling1_name }} / 
                                        {{ $d->sibling1_age }} / 
                                        {{ $d->sibling1_occupation }}
                                    @endif
                                    </u>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <u>
                                    @if(!empty($d->sibling2_name))
                                        {{ $d->sibling2_name }} / 
                                        {{ $d->sibling2_age }} / 
                                        {{ $d->sibling2_occupation }}
                                    @endif
                                    </u>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <u>
                                    @if(!empty($d->sibling3_name))
                                        {{ $d->sibling3_name }} / 
                                        {{ $d->sibling3_age }} / 
                                        {{ $d->sibling3_occupation }}
                                    @endif
                                    </u>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <u>
                                    @if(!empty($d->sibling4_name))
                                        {{ $d->sibling4_name }} / 
                                        {{ $d->sibling4_age }} / 
                                        {{ $d->sibling4_occupation }}
                                    @endif
                                    </u>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <u>
                                    @if(!empty($d->sibling5_name))
                                        {{ $d->sibling5_name }} / 
                                        {{ $d->sibling5_age }} / 
                                        {{ $d->sibling5_occupation }}
                                    @endif
                                    </u>
                                </strong>
                            </li>
                        </ul>
                    </li>
                    <li>Number of Rooms in the House: <strong><u>{{ $d->number_of_romms }}</u></strong></li>
                    <li>Economic Status of the Family: <strong><u>{{ $d->econ_status }}</u></strong></li>
                    <li>Average Gross Annual Income: <strong><u>{{ $d->anual_income }}</u></strong></li>
                    <li>Source of Income: <strong><u>{{ $d->source_of_income }}</u></strong></li>
                </ol>
                <h4>III. Ineterest, Activities and Recreations</h4>
                <ol type="A">
                    <li>
                        <div class="row">
                            <div class="col-lg-6">
                                Subjects you Like Most (3)
                                <ul>
                                    <li><strong><u>{{ $d->subject_like_1 }}</u></strong></li>
                                    <li><strong><u>{{ $d->subject_like_2 }}</u></strong></li>
                                    <li><strong><u>{{ $d->subject_like_3 }}</u></strong></li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                Subject you like least (3)
                                <ul>
                                    <li><strong><u>{{ $d->subject_least_1 }}</u></strong></li>
                                    <li><strong><u>{{ $d->subject_least_2 }}</u></strong></li>
                                    <li><strong><u>{{ $d->subject_least_3 }}</u></strong></li>
                                </ul>
                            </div>
                        </div>
                        
                    </li>
                    <li>Specific Activity of Interest which you desire to participate in: <strong><u>{{ $d->special_activities }}</u></strong></li>
                    <li>Hobbies (3)
                        <ol>
                            <li><strong><u>{{ $d->hobbies1 }}</u></strong></li>
                            <li><strong><u>{{ $d->hobbies2 }}</u></strong></li>
                            <li><strong><u>{{ $d->hobbies3 }}</u></strong></li>
                        </ol>
                    </li>
                </ol>
                <h4>IV. Activities-Achievement Data</h4>
                <p>Activities in different year level: High School</p>
                <ol type="1">
                    <li>First Year: <strong><u>{{ $d->aa_data1 }}</u></strong></li>
                    <li>Second Year: <strong><u>{{ $d->aa_data2 }}</u></strong></li>
                    <li>Third Year: <strong><u>{{ $d->aa_data3 }}</u></strong></li>
                    <li>Forth Year: <strong><u>{{ $d->aa_data4 }}</u></strong></li>
                </ol>
    		</div>
    	</div>
    	
    </div>

</div>
@endsection