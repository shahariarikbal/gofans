<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'name' => 'Client',
            'email' => 'palash.sudip@gmail.com',
            'skype_id' => '',
            'mobile_number' => '',
            'password' => bcrypt('12345678'),
            'status' => 1,
        ]);
    }
}
