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
            $table->string('student_id', 20); // Student ID/LRN
            // Personal Date - other data found in users table
            $table->string('sex', 10)->nullable();
            $table->string('religion', 20)->nullable();
            $table->string('home_address', 30)->nullable();
            $table->string('place_of_birth', 30)->nullable();
            $table->string('course', 30)->nullable();
            // Education
            // Elementary
            $table->string('elem_school', 30)->nullable();
            $table->string('elem_address', 30)->nullable();
            $table->string('elem_grad_sy', 30)->nullable();
            // High School
            $table->string('hs_school', 30)->nullable();
            $table->string('hs_address', 30)->nullable();
            $table->string('hs_grad_sy', 30)->nullable();
            // 3 Special Skills/Talent
            $table->string('skill_talent_1', 30)->nullable();
            $table->string('skill_talent_2', 30)->nullable();
            $table->string('skill_talent_3', 30)->nullable();
            // Family/Cultural Background
            // Father
            $table->string('fathers_name', 30)->nullable();
            $table->integer('fathers_age')->nullable();
            $table->string('fathers_pob', 30)->nullable();  // Place Of Birth
            $table->string('fathers_home_address', 30)->nullable();
            $table->string('fathers_hea', 30)->nullable(); // Highest Educational Attainment
            $table->string('fathers_occupation', 30)->nullable();
            $table->string('fathers_language', 30)->nullable();
            $table->string('fathers_religion', 30)->nullable();
            // Mother
            $table->string('mothers_name', 30)->nullable();
            $table->integer('mothers_age')->nullable();
            $table->string('mothers_pob', 30)->nullable(); // Place of Birth
            $table->string('mothers_home_address', 30)->nullable();
            $table->string('mothers_hea', 30)->nullable(); // Highest Educational Attainment
            $table->string('mothers_occupation', 30)->nullable();
            $table->string('mothers_language', 30)->nullable();
            $table->string('mothers_religion', 30)->nullable();
            // Guardian
            $table->string('guardians_name', 30)->nullable();
            $table->integer('guardians_age')->nullable();
            $table->string('guardians_pob', 30)->nullable(); // Place of Birth
            $table->string('guardians_home_address', 30)->nullable();
            $table->string('guardians_hea', 30)->nullable(); // Highest Educational Attainment
            $table->string('guardians_occupation', 30)->nullable();
            $table->string('guardians_language', 30)->nullable();
            $table->string('guardians_religion', 30)->nullable();
            // Siblings
            $table->string('sibling1_name', 50)->nullable();
            $table->integer('sibling1_age')->nullable();
            $table->string('sibling1_occupation', 30)->nullable();

            $table->string('sibling2_name', 50)->nullable();
            $table->integer('sibling2_age')->nullable();
            $table->string('sibling2_occupation', 30)->nullable();

            $table->string('sibling3_name', 50)->nullable();
            $table->integer('sibling3_age')->nullable();
            $table->string('sibling3_occupation', 30)->nullable();

            $table->string('sibling4_name', 50)->nullable();
            $table->integer('sibling4_age')->nullable();
            $table->string('sibling4_occupation', 30)->nullable();

            $table->string('sibling5_name', 50)->nullable();
            $table->integer('sibling5_age')->nullable();
            $table->string('sibling5_occupation', 30)->nullable();

            $table->integer('number_of_romms')->nullable();

            $table->string('econ_status', 30)->nullable();

            $table->integer('anual_income')->nullable();

            $table->string('source_of_income', 30)->nullable();
            // Interest, Activities and Recreatons
            // 3 subject like most
            $table->string('subject_like_1', 20)->nullable();
            $table->string('subject_like_2', 20)->nullable();
            $table->string('subject_like_3', 20)->nullable();
            // 3 subject leat like
            $table->string('subject_least_1', 20)->nullable();
            $table->string('subject_least_2', 20)->nullable();
            $table->string('subject_least_3', 20)->nullable();
            // Special Activity
            $table->string('special_activities', 30)->nullable();
            // Hobbies
            $table->string('hobbies1', 30)->nullable();
            $table->string('hobbies2', 30)->nullable();
            $table->string('hobbies3', 30)->nullable();

            // Achievements
            $table->string('aa_data1', 30)->nullable();
            $table->string('aa_data2', 30)->nullable();
            $table->string('aa_data3', 30)->nullable();
            $table->string('aa_data4', 30)->nullable();

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
