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

        // student
        DB::table('users')->insert([
            'user_id' => '106330120056',
            'firstname' => 'Michael Adam',
            'lastname' => 'Trinidad',
            'email' => 'adam@adam.com',
            'mobile' => '09156119134',
            'birthday' => date('Y-m-d', strtotime('11/1/1992')),
            'password' => bcrypt('0000'),
            'privilege' => '3' // student privilege
            ]);

    }
}
