<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id'); // Student ID/LRN
            // Personal Date - other data found in users table
            $table->string('sex')->nullable();
            $table->string('religion')->nullable();
            $table->string('home_address')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('course')->nullable();
            // Education
            // Elementary
            $table->string('elem_school')->nullable();
            $table->string('elem_address')->nullable();
            $table->string('elem_grad_sy')->nullable();
            // High School
            $table->string('hs_school')->nullable();
            $table->string('hs_address')->nullable();
            $table->string('hs_grad_sy')->nullable();
            // 3 Special Skills/Talent
            $table->string('skill_talent_1')->nullable();
            $table->string('skill_talent_2')->nullable();
            $table->string('skill_talent_3')->nullable();
            // Family/Cultural Background
            // Father
            $table->string('fathers_name')->nullable();
            $table->string('fathers_age')->nullable();
            $table->string('fathers_pob')->nullable();  // Place Of Birth
            $table->string('fathers_home_address')->nullable();
            $table->string('fathers_hea')->nullable(); // Highest Educational Attainment
            $table->string('fathers_occupation')->nullable();
            $table->string('fathers_language')->nullable();
            $table->string('fathers_religion')->nullable();
            // Mother
            $table->string('mothers_name')->nullable();
            $table->string('mothers_age')->nullable();
            $table->string('mothers_pob')->nullable(); // Place of Birth
            $table->string('mothers_home_address')->nullable();
            $table->string('mothers_hea')->nullable(); // Highest Educational Attainment
            $table->string('mothers_occupation')->nullable();
            $table->string('mothers_language')->nullable();
            $table->string('mothers_religion')->nullable();
            // Guardian
            $table->string('guardians_name')->nullable();
            $table->string('guardians_age')->nullable();
            $table->string('guardians_pob')->nullable(); // Place of Birth
            $table->string('guardians_home_address')->nullable();
            $table->string('guardians_hea')->nullable(); // Highest Educational Attainment
            $table->string('guardians_occupation')->nullable();
            $table->string('guardians_language')->nullable();
            $table->string('guardians_religion')->nullable();
            // Siblings
            $table->string('sibling1_name')->nullable();
            $table->string('sibling1_age')->nullable();
            $table->string('sibling1_occupation')->nullable();

            $table->string('sibling2_name')->nullable();
            $table->string('sibling2_age')->nullable();
            $table->string('sibling2_occupation')->nullable();

            $table->string('sibling3_name')->nullable();
            $table->string('sibling3_age')->nullable();
            $table->string('sibling3_occupation')->nullable();

            $table->string('sibling4_name')->nullable();
            $table->string('sibling4_age')->nullable();
            $table->string('sibling4_occupation')->nullable();

            $table->string('sibling5_name')->nullable();
            $table->string('sibling5_age')->nullable();
            $table->string('sibling5_occupation')->nullable();

            $table->string('number_of_romms')->nullable();

            $table->string('econ_status')->nullable();

            $table->string('anual_income')->nullable();

            $table->string('source_of_income')->nullable();
            // Interest, Activities and Recreatons
            // 3 subject like most
            $table->string('subject_like_1')->nullable();
            $table->string('subject_like_2')->nullable();
            $table->string('subject_like_3')->nullable();
            // 3 subject leat like
            $table->string('subject_least_1')->nullable();
            $table->string('subject_least_2')->nullable();
            $table->string('subject_least_3')->nullable();
            // Special Activity
            $table->string('special_activities')->nullable();
            // Hobbies
            $table->string('hobbies1')->nullable();
            $table->string('hobbies2')->nullable();
            $table->string('hobbies3')->nullable();

            // Achievements
            $table->string('aa_data1')->nullable();
            $table->string('aa_data2')->nullable();
            $table->string('aa_data3')->nullable();
            $table->string('aa_data4')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_datas');
    }
}
