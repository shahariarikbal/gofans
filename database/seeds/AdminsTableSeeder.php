<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Admin',
            'email' => 'palash.sudip@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'super',
            'status' => 1,
        ]);
    }
}
