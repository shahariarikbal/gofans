<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_users')->insert([
            'name' => 'Admin User',
            'email' => 'palash.sudip@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'super',
            'status' => 1,
        ]);
    }
}
