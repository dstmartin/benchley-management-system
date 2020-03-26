<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FamiliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('families')->insert([
            'familyphoto'   => 'photos/temp.jpeg',
            'lastname'      => 'St. Martin',
            'address'       => '1208 Harrisonburg Ln',
            'city'  => 'College Station',
            'state'     => 'Texas',
            'zip'     => '77845',
            'is_active' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
