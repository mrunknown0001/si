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
    		'user_id' => 'admin',
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
            'user_id' => '0001-1111',
            'firstname' => 'Teacher',
            'lastname' => 'Adviser',
            'email' => 'teacher@admin.com',
            'mobile' => '09222222222',
            'password' => bcrypt('1111'),
            'privilege' =>'2',  // co-admin privilege // Adviser Privillege
            'birthday' => date('Y-m-d', strtotime('10/1/1992')),
            'sex' => 'Male',
            'address' => 'Tarlac'
            ]);

        DB::table('users')->insert([
            'user_id' => '0002-2222',
            'firstname' => 'Juan',
            'lastname' => 'Dela Cruz',
            'email' => 'teacher.juan@admin.com',
            'mobile' => '09222222222',
            'password' => bcrypt('2222'),
            'privilege' =>'2',  // co-admin privilege // Adviser Privillege
            'birthday' => date('Y-m-d', strtotime('10/1/1992')),
            'sex' => 'Male',
            'address' => 'Tarlac'
            ]);

        DB::table('users')->insert([
            'user_id' => '0003-3333',
            'firstname' => 'Juana',
            'lastname' => 'Dela Cruz',
            'email' => 'teacher.juana@admin.com',
            'mobile' => '09222222222',
            'password' => bcrypt('2222'),
            'privilege' =>'2',  // co-admin privilege // Adviser Privillege
            'birthday' => date('Y-m-d', strtotime('10/1/1992')),
            'sex' => 'Female',
            'address' => 'Tarlac'
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

        DB::table('subjects')->insert([
            'level' => 'grade7',
            'title' => 'math1',
            'description' => 'mathematics1'
            ]);

        DB::table('subjects')->insert([
            'level' => 'grade7',
            'title' => 'science1',
            'description' => 'science 1 biology'
            ]);

        DB::table('subjects')->insert([
            'level' => 'grade7',
            'title' => 'history1',
            'description' => 'asian history'
            ]);

        DB::table('subjects')->insert([
            'level' => 'grade8',
            'title' => 'math2',
            'description' => 'algebra'
            ]);

        DB::table('subjects')->insert([
            'level' => 'grade8',
            'title' => 'physics',
            'description' => 'physical science'
            ]);

        DB::table('subjects')->insert([
            'level' => 'grade9',
            'title' => 'trigonometry',
            'description' => 'trygonometry'
            ]);

        DB::table('subjects')->insert([
            'level' => 'grade10',
            'title' => 'math101',
            'description' => 'fundamentals of calculus'
            ]);

        DB::table('subjects')->insert([
            'level' => 'grade11',
            'title' => 'history 3',
            'description' => 'world history'
            ]);

        DB::table('subjects')->insert([
            'level' => 'grade12',
            'title' => 'PE',
            'description' => 'physical education'
            ]);


        DB::table('class_blocks')->insert([
            'level' => 'grade7',
            'name' => 'red'
            ]);

        DB::table('class_blocks')->insert([
            'level' => 'grade7',
            'name' => 'blue'
            ]);

        DB::table('class_blocks')->insert([
            'level' => 'grade7',
            'name' => 'green'
            ]);

        DB::table('class_blocks')->insert([
            'level' => 'grade8',
            'name' => 'nara'
            ]);

        DB::table('class_blocks')->insert([
            'level' => 'grade8',
            'name' => 'acacia'
            ]);

        DB::table('class_blocks')->insert([
            'level' => 'grade8',
            'name' => 'red'
            ]);

        DB::table('class_blocks')->insert([
            'level' => 'grade8',
            'name' => 'mahogany'
            ]);

        DB::table('class_blocks')->insert([
            'level' => 'grade9',
            'name' => 'river'
            ]);
        DB::table('class_blocks')->insert([
            'level' => 'grade9',
            'name' => 'ocean'
            ]);

        DB::table('class_blocks')->insert([
            'level' => 'grade10',
            'name' => 'earth'
            ]);

        DB::table('class_blocks')->insert([
            'level' => 'grade10',
            'name' => 'mars'
            ]);

        DB::table('class_blocks')->insert([
            'level' => 'grade11',
            'name' => 'eagle'
            ]);

        DB::table('class_blocks')->insert([
            'level' => 'grade11',
            'name' => 'parrot'
            ]);

        DB::table('class_blocks')->insert([
            'level' => 'grade12',
            'name' => 'mahusay'
            ]);
    }
}
