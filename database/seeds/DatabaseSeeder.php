<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // admin
    	DB::table('users')->insert([
    		'user_id' => '143934412',
    		'firstname' => 'Admin',
    		'lastname' => 'Admin',
    		'email' => 'admin@admin.com',
    		'mobile' => '09111111111',
    		'password' => bcrypt('admin'),
    		'privilege' =>'1',  // admin privilege
            'birthday' => date('Y-m-d', strtotime('11/1/1992'))
    		]);

        // co-admin
        DB::table('users')->insert([
            'user_id' => '143934413',
            'firstname' => 'Co-Admin',
            'lastname' => 'Co-Admin',
            'email' => 'coadmin@admin.com',
            'mobile' => '09222222222',
            'password' => bcrypt('admin'),
            'privilege' =>'2',  // co-admin privilege
            'birthday' => date('Y-m-d', strtotime('10/1/1992'))
            ]);


        /*
         * Insert only one - Quarters
         */
        DB::table('quarter_selects')->insert([
            'code' => 'first',
            'status' => 0,
            'finish' => 0
            ]);

        DB::table('quarter_selects')->insert([
            'code' => 'second',
            'status' => 0,
            'finish' => 0
            ]);

        DB::table('quarter_selects')->insert([
            'code' => 'third',
            'status' => 0,
            'finish' => 0
            ]);

        DB::table('quarter_selects')->insert([
            'code' => 'forth',
            'status' => 0,
            'finish' => 0
            ]);




        // /*
        //  * Grade Levels
        //  */
        // DB::table('grade_levels')->insert([
        //     'code' => 'GRD7',
        //     'title' => 'Grade 7',
        //     'description' => 'Grade 7'
        //     ]);


        // DB::table('grade_levels')->insert([
        //     'code' => 'GRD8',
        //     'title' => 'Grade 8',
        //     'description' => 'Grade 8'
        //     ]);


        // DB::table('grade_levels')->insert([
        //     'code' => 'GRD9',
        //     'title' => 'Grade 9',
        //     'description' => 'Grade 9'
        //     ]);


        // DB::table('grade_levels')->insert([
        //     'code' => 'GRD10',
        //     'title' => 'Grade 10',
        //     'description' => 'Grade 10'
        //     ]);


        // DB::table('grade_levels')->insert([
        //     'code' => 'JUNIOR',
        //     'title' => 'Junior',
        //     'description' => 'Junior High'
        //     ]);


        // DB::table('grade_levels')->insert([
        //     'code' => 'SENIOR',
        //     'title' => 'Senior',
        //     'description' => 'Senior'
        //     ]);


        // /*
        //  * SAmple Grade Block
        //  */
        // DB::table('class_blocks')->insert([
        //     'code' => 'Mahusay',
        //     'name' => 'Mahusay',
        //     'description' => 'Mahusay'
        //     ]);

    }
}
