<div class="modal fade" id="{{ $student->student_id }}-view" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-success">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Student Details - {{ $block->leveltitle->title }} - {{ $block->blockname->name }}</h4>
            </div>
            <div class="modal-body">
                <h4>LRN: <strong><u>{{ $student->student->user_id }}</u></strong></h4>
                <h4>I. Personal Data</h4>
                <ol type="1">
                    <li>Name: <strong><u>{{ $student->student->firstname }}  {{ $student->student->lastname }}</u></strong></li>
                    <li>Email: <strong><u>{{ $student->student->email }}</u></strong></li>
                    <li>Mobile: <strong><u>{{ $student->student->mobile }}</u></strong></li>
                    <li>Birthday: <strong><u>{{ date('F j, Y', strtotime($student->student->birthday)) }}</u></strong></li>
                    <li>Sex: <strong><u>{{ $student->data->sex }}</u></strong></li>
                    <li>Religion: <strong><u>{{ $student->data->religion }}</u></strong></li>
                    <li>Place of Birth: <strong><u>{{ $student->data->place_of_birth }}</u></strong></li>
                    <li>Home Address: <strong><u>{{ $student->data->home_address }}</u></strong></li>
                    <li>Course: <strong><u>{{ $student->data->course }}</u></strong></li>
                    <li>Education
                        <ol type="a">
                            <li>
                                <strong><u>
                                {{ $student->data->elem_school }} /
                                {{ $student->data->elem_address }} / 
                                {{ $student->data->elem_grad_sy }}
                                </u></strong>
                                <br/>
                                <i>(Elementary School / Address / SY Completed)</i>
                            </li>
                            <li>
                                <strong>
                                <u>
                                    {{ $student->data->hs_school }} / 
                                    {{ $student->data->hs_address }} / 
                                    {{ $student->data->hs_grad_sy }}
                                </u>
                                </strong>
                                <br/>
                                <i>(High School School / Address / SY Completed)</i>
                            </li>
                        </ol>
                    </li><li>Special Skill/Talent
                        <ol>
                            <li>Skills/Talent: <strong><u>{{ $student->data->skill_talent_1 }}</u></strong></li>
                            <li>Skills/Talent: <strong><u>{{ $student->data->skill_talent_2 }}</u></strong></li>
                            <li>Skills/Talent: <strong><u>{{ $student->data->skill_talent_3 }}</u></strong></li>
                        </ol>
                    </li>
                </ol>
                <h4>II. Family/Cultural Background Data</h4>
                <ol type="1">
                    <li>
                        <ul>
                            <li>Father's Name: <strong><u>{{ $student->data->fathers_name }}</u></strong></li> 
                            <li>Age: <strong><u>{{ $student->data->fathers_age }}</u></strong></li>
                            <li>Place of Birth: <strong><u>{{ $student->data->fathers_pob }}</u></strong></li>
                            <li>Home Address: <strong><u>{{ $student->data->fathers_home_address }}</u></strong></li>
                            <li>Highest Educational Attainment: <strong><u>{{ $student->data->fathers_hea }}</u></strong></li>
                            <li>Occupation: <strong><u>{{ $student->data->fathers_occupation }}</u></strong></li>
                            <li>Language Spoken: <strong><u>{{ $student->data->fathers_language }}</u></strong></li>
                            <li>Religion: <strong><u>{{ $student->data->fathers_religion }}</u></strong></li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Mothers's Name: <strong><u>{{ $student->data->mothers_name }}</u></strong></li> 
                            <li>Age: <strong><u>{{ $student->data->mothers_age }}</u></strong></li>
                            <li>Place of Birth: <strong><u>{{ $student->data->mothers_pob }}</u></strong></li>
                            <li>Home Address: <strong><u>{{ $student->data->mothers_home_address }}</u></strong></li>
                            <li>Highest Educational Attainment: <strong><u>{{ $student->data->mothers_hea }}</u></strong></li>
                            <li>Occupation: <strong><u>{{ $student->data->mothers_occupation }}</u></strong></li>
                            <li>Language Spoken: <strong><u>{{ $student->data->mothers_language }}</u></strong></li>
                            <li>Religion: <strong><u>{{ $student->data->mothers_religion }}</u></strong></li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Guardian's Name: <strong><u>{{ $student->data->guardians_name }}</u></strong></li> 
                            <li>Age: <strong><u>{{ $student->data->guardians_age }}</u></strong></li>
                            <li>Place of Birth: <strong><u>{{ $student->data->guardians_pob }}</u></strong></li>
                            <li>Home Address: <strong><u>{{ $student->data->guardians_home_address }}</u></strong></li>
                            <li>Highest Educational Attainment: <strong><u>{{ $student->data->guardians_hea }}</u></strong></li>
                            <li>Occupation: <strong><u>{{ $student->data->guardians_occupation }}</u></strong></li>
                            <li>Language Spoken: <strong><u>{{ $student->data->guardians_language }}</u></strong></li>
                            <li>Religion: <strong><u>{{ $student->data->guardians_religion }}</u></strong></li>
                        </ul>
                    </li>
                    <li>
                        Siblings
                        <ul>
                            <li>Name / Age / Accupation</li>
                            <li>
                                <strong>
                                    <u>
                                    @if(!empty($student->data->sibling1_name))
                                        {{ $student->data->sibling1_name }} / 
                                        {{ $student->data->sibling1_age }} / 
                                        {{ $student->data->sibling1_occupation }}
                                    @endif
                                    </u>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <u>
                                    @if(!empty($student->data->sibling2_name))
                                        {{ $student->data->sibling2_name }} / 
                                        {{ $student->data->sibling2_age }} / 
                                        {{ $student->data->sibling2_occupation }}
                                    @endif
                                    </u>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <u>
                                    @if(!empty($student->data->sibling3_name))
                                        {{ $student->data->sibling3_name }} / 
                                        {{ $student->data->sibling3_age }} / 
                                        {{ $student->data->sibling3_occupation }}
                                    @endif
                                    </u>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <u>
                                    @if(!empty($student->data->sibling4_name))
                                        {{ $student->data->sibling4_name }} / 
                                        {{ $student->data->sibling4_age }} / 
                                        {{ $student->data->sibling4_occupation }}
                                    @endif
                                    </u>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <u>
                                    @if(!empty($student->data->sibling5_name))
                                        {{ $student->data->sibling5_name }} / 
                                        {{ $student->data->sibling5_age }} / 
                                        {{ $student->data->sibling5_occupation }}
                                    @endif
                                    </u>
                                </strong>
                            </li>
                        </ul>
                    </li>
                    <li>Number of Rooms in the House: <strong><u>{{ $student->data->number_of_romms }}</u></strong></li>
                    <li>Economic Status of the Family: <strong><u>{{ $student->data->econ_status }}</u></strong></li>
                    <li>Average Gross Annual Income: <strong><u>{{ $student->data->anual_income }}</u></strong></li>
                    <li>Source of Income: <strong><u>{{ $student->data->source_of_income }}</u></strong></li>
                </ol>
                <h4>III. Ineterest, Activities and Recreations</h4>
                <ol type="A">
                    <li>
                        <div class="row">
                            <div class="col-lg-6">
                                Subjects you Like Most (3)
                                <ul>
                                    <li><strong><u>{{ $student->data->subject_like_1 }}</u></strong></li>
                                    <li><strong><u>{{ $student->data->subject_like_2 }}</u></strong></li>
                                    <li><strong><u>{{ $student->data->subject_like_3 }}</u></strong></li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                Subject you like least (3)
                                <ul>
                                    <li><strong><u>{{ $student->data->subject_least_1 }}</u></strong></li>
                                    <li><strong><u>{{ $student->data->subject_least_2 }}</u></strong></li>
                                    <li><strong><u>{{ $student->data->subject_least_3 }}</u></strong></li>
                                </ul>
                            </div>
                        </div>
                        
                    </li>
                    <li>Specific Activity of Interest which you desire to participate in: <strong><u>{{ $student->data->special_activities }}</u></strong></li>
                    <li>Hobbies (3)
                        <ol>
                            <li><strong><u>{{ $student->data->hobbies1 }}</u></strong></li>
                            <li><strong><u>{{ $student->data->hobbies2 }}</u></strong></li>
                            <li><strong><u>{{ $student->data->hobbies3 }}</u></strong></li>
                        </ol>
                    </li>
                </ol>
                <h4>IV. Activities-Achievement Data</h4>
                <p>Activities in different year level: High School</p>
                <ol type="1">
                    <li>First Year: <strong><u>{{ $student->data->aa_data1 }}</u></strong></li>
                    <li>Second Year: <strong><u>{{ $student->data->aa_data2 }}</u></strong></li>
                    <li>Third Year: <strong><u>{{ $student->data->aa_data3 }}</u></strong></li>
                    <li>Forth Year: <strong><u>{{ $student->data->aa_data4 }}</u></strong></li>
                </ol>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>

    </div>
</div>
