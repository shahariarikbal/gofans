<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Mobile App'],
            ['id' => 2, 'name' => 'Youtube'],
            ['id' => 3, 'name' => 'Instagram'],
            ['id' => 4, 'name' => 'Facebook'],
            ['id' => 5, 'name' => 'Twitter'],
            ['id' => 6, 'name' => 'Podcast'],
            ['id' => 7, 'name' => 'Google Music'],
            ['id' => 8, 'name' => 'Apple Music'],
            ['id' => 9, 'name' => 'Spotify'],
            ['id' => 10, 'name' => 'Tidal'],     
        ]);
    }
}
