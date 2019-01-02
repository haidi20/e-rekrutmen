<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
        	[
        		'email' 	=> 'admin@admin.com',
        		'username' 	=> 'admin',
        		'role' 		=> 'admin',
        		'password'	=> bcrypt('samarinda')
        	],
        	[
        		'email' 	=> 'cybersamarinda@gmail.com',
        		'username' 	=> 'user',
        		'role' 		=> 'user',
        		'password'	=> bcrypt('samarinda')
        	]
        ]);
    }
}
