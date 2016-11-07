<div class="modal fade" id="{{ $s->user_id }}-view" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-success">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Student Details</h4>
            </div>
            <div class="modal-body">
                <h4>LRN: <strong><u>{{ $s->user_id }}</u></strong></h4>
                <h4>I. Personal Data</h4>
                <ol>
                    <li>Name: <strong><u>{{ $s->firstname }} {{ $s->lastname }}</u></strong></li>
                    <li>Sex: <strong><u>{{ $s->sex }}</u></strong></li>
                    <li>Date of Birth: <strong><u>{{ date('F j, Y', strtotime($s->birthday)) }}</u></strong></li>
                    <li>Religion: <strong><u>{{ $s->religion }}</u></strong></li>
                    <li>Place of Birth: <strong><u>{{ $s->place_of_birth }}</u></strong></li>
                    <li>Home Address: <strong><u>{{ $s->home_address }}</u></strong></li>
                    <li>Course: <strong><u>{{ $s->course }}</u></strong></li>
                    <li>Education
                        <ol type="a">
                            <li>
                                <strong><u>
                                {{ $s->elem_school }} /
                                {{ $s->elem_address }} / 
                                {{ $s->elem_grad_sy }}
                                </u></strong>
                                <br/>
                                <i>(Elementary School / Address / SY Completed)</i>
                            </li>
                            <li>
                                <strong>
                                <u>
                                    {{ $s->hs_school }} / 
                                    {{ $s->hs_address }} / 
                                    {{ $s->hs_grad_sy }}
                                </u>
                                </strong>
                                <br/>
                                <i>(High School School / Address / SY Completed)</i>
                            </li>
                        </ol>
                    </li><li>Special Skill/Talent
                        <ol>
                            <li>Skills/Talent: <strong><u>{{ $s->skill_talent_1 }}</u></strong></li>
                            <li>Skills/Talent: <strong><u>{{ $s->skill_talent_2 }}</u></strong></li>
                            <li>Skills/Talent: <strong><u>{{ $s->skill_talent_3 }}</u></strong></li>
                        </ol>
                    </li>
                </ol>
                <h4>II. Family/Cultural Background Data</h4>
                <ol type="1">
                    <li>
                        <ul>
                            <li>Father's Name: <strong><u>{{ $s->fathers_name }}</u></strong></li> 
                            <li>Age: <strong><u>{{ $s->fathers_age }}</u></strong></li>
                            <li>Place of Birth: <strong><u>{{ $s->fathers_pob }}</u></strong></li>
                            <li>Home Address: <strong><u>{{ $s->fathers_home_address }}</u></strong></li>
                            <li>Highest Educational Attainment: <strong><u>{{ $s->fathers_hea }}</u></strong></li>
                            <li>Occupation: <strong><u>{{ $s->fathers_occupation }}</u></strong></li>
                            <li>Language Spoken: <strong><u>{{ $s->fathers_language }}</u></strong></li>
                            <li>Religion: <strong><u>{{ $s->fathers_religion }}</u></strong></li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Mothers's Name: <strong><u>{{ $s->mothers_name }}</u></strong></li> 
                            <li>Age: <strong><u>{{ $s->mothers_age }}</u></strong></li>
                            <li>Place of Birth: <strong><u>{{ $s->mothers_pob }}</u></strong></li>
                            <li>Home Address: <strong><u>{{ $s->mothers_home_address }}</u></strong></li>
                            <li>Highest Educational Attainment: <strong><u>{{ $s->mothers_hea }}</u></strong></li>
                            <li>Occupation: <strong><u>{{ $s->mothers_occupation }}</u></strong></li>
                            <li>Language Spoken: <strong><u>{{ $s->mothers_language }}</u></strong></li>
                            <li>Religion: <strong><u>{{ $s->mothers_religion }}</u></strong></li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Guardian's Name: <strong><u>{{ $s->guardians_name }}</u></strong></li> 
                            <li>Age: <strong><u>{{ $s->guardians_age }}</u></strong></li>
                            <li>Place of Birth: <strong><u>{{ $s->guardians_pob }}</u></strong></li>
                            <li>Home Address: <strong><u>{{ $s->guardians_home_address }}</u></strong></li>
                            <li>Highest Educational Attainment: <strong><u>{{ $s->guardians_hea }}</u></strong></li>
                            <li>Occupation: <strong><u>{{ $s->guardians_occupation }}</u></strong></li>
                            <li>Language Spoken: <strong><u>{{ $s->guardians_language }}</u></strong></li>
                            <li>Religion: <strong><u>{{ $s->guardians_religion }}</u></strong></li>
                        </ul>
                    </li>
                    <li>
                        Siblings
                        <ul>
                            <li>Name / Age / Accupation</li>
                            <li>
                                <strong>
                                    <u>
                                    @if(!empty($s->sibling1_name))
                                        {{ $s->sibling1_name }} / 
                                        {{ $s->sibling1_age }} / 
                                        {{ $s->sibling1_occupation }}
                                    @endif
                                    </u>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <u>
                                    @if(!empty($s->sibling2_name))
                                        {{ $s->sibling2_name }} / 
                                        {{ $s->sibling2_age }} / 
                                        {{ $s->sibling2_occupation }}
                                    @endif
                                    </u>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <u>
                                    @if(!empty($s->sibling3_name))
                                        {{ $s->sibling3_name }} / 
                                        {{ $s->sibling3_age }} / 
                                        {{ $s->sibling3_occupation }}
                                    @endif
                                    </u>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <u>
                                    @if(!empty($s->sibling4_name))
                                        {{ $s->sibling4_name }} / 
                                        {{ $s->sibling4_age }} / 
                                        {{ $s->sibling4_occupation }}
                                    @endif
                                    </u>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <u>
                                    @if(!empty($s->sibling5_name))
                                        {{ $s->sibling5_name }} / 
                                        {{ $s->sibling5_age }} / 
                                        {{ $s->sibling5_occupation }}
                                    @endif
                                    </u>
                                </strong>
                            </li>
                        </ul>
                    </li>
                    <li>Number of Rooms in the House: <strong><u>{{ $s->number_of_romms }}</u></strong></li>
                    <li>Economic Status of the Family: <strong><u>{{ $s->econ_status }}</u></strong></li>
                    <li>Average Gross Annual Income: <strong><u>{{ $s->anual_income }}</u></strong></li>
                    <li>Source of Income: <strong><u>{{ $s->source_of_income }}</u></strong></li>
                </ol>
                <h4>III. Ineterest, Activities and Recreations</h4>
                <ol type="A">
                    <li>
                        <div class="row">
                            <div class="col-lg-6">
                                Subjects you Like Most (3)
                                <ul>
                                    <li><strong><u>{{ $s->subject_like_1 }}</u></strong></li>
                                    <li><strong><u>{{ $s->subject_like_2 }}</u></strong></li>
                                    <li><strong><u>{{ $s->subject_like_3 }}</u></strong></li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                Subject you like least (3)
                                <ul>
                                    <li><strong><u>{{ $s->subject_least_1 }}</u></strong></li>
                                    <li><strong><u>{{ $s->subject_least_2 }}</u></strong></li>
                                    <li><strong><u>{{ $s->subject_least_3 }}</u></strong></li>
                                </ul>
                            </div>
                        </div>
                        
                    </li>
                    <li>Specific Activity of Interest which you desire to participate in: <strong><u>{{ $s->special_activities }}</u></strong></li>
                    <li>Hobbies (3)
                        <ol>
                            <li><strong><u>{{ $s->hobbies1 }}</u></strong></li>
                            <li><strong><u>{{ $s->hobbies2 }}</u></strong></li>
                            <li><strong><u>{{ $s->hobbies3 }}</u></strong></li>
                        </ol>
                    </li>
                </ol>
                <h4>IV. Activities-Achievement Data</h4>
                <p>Activities in different year level: High School</p>
                <ol type="1">
                    <li>First Year: <strong><u>{{ $s->aa_data1 }}</u></strong></li>
                    <li>Second Year: <strong><u>{{ $s->aa_data2 }}</u></strong></li>
                    <li>Third Year: <strong><u>{{ $s->aa_data3 }}</u></strong></li>
                    <li>Forth Year: <strong><u>{{ $s->aa_data4 }}</u></strong></li>
                </ol>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>

    </div>
</div>
