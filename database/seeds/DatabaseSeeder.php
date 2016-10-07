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

    	DB::table('users')->insert([
    		'user_id' => '12345',
    		'firstname' => 'Admin',
    		'lastname' => 'Admin',
    		'email' => 'admin@admin.com',
    		'mobile' => '09111111111',
    		'password' => bcrypt('admin'),
    		'privilege' =>'1',
            'birthday' => '11/1/1992'
    		]);

        DB::table('users')->insert([
            'user_id' => '54321',
            'firstname' => 'Co-Admin',
            'lastname' => 'Co-Admin',
            'email' => 'coadmin@admin.com',
            'mobile' => '09222222222',
            'password' => bcrypt('admin'),
            'privilege' =>'2',
            'birthday' => '10/1/1992'
            ]);

        // DB::table('students')->insert([
        //     'student_id' => '111',
        //     'firstname' => 'Michael Adam',
        //     'lastname' => 'Trinidad',
        //     'email' => 'adam@adam.com',
        //     'mobile' => '09156119134',
        //     'birthday' => '11/1/1992',
        //     'password' => bcrypt('adam'),
        //     'privilege' => '3'
        //     ]);

    }
}
