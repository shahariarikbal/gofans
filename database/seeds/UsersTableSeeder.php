<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name'          => 'User',
            'email'         => 'palash.sudip@gmail.com',
            'mobile_number' => '01710000000',
            'country'       => 'Bangladesh',
            'password'      => bcrypt('12345678'),
            'status'        => 1,
        ]);

        DB::table('user_details')->insert([
            'user_id'      => 1,
            'gender'       => 'Male',
            'skype_id'     => 'palashsudip',
            'current_city' => 'Dhaka',
            'home_city'    => 'Dhaka',
        ]);

        /* factory(User::class,20)->create()->each(function($user){
            $user->os = 'ios';
            $user->gender = "Male";
        }); */
    }
}
