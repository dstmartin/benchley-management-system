<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 25; $i++) {
            DB::table('people')->insert([
                'firstname' => $faker->firstName,
                //'lastname'  => $faker->lastName,
                'email'     => $faker->email,
                'phoneHome' => $faker->phoneNumber,
                'phoneCell' => $faker->phoneNumber,
                'phoneWork' => $faker->phoneNumber,
                'birthdate' => $faker->dateTimeThisCentury(),
                'gender'    => $faker->randomElement($array = array ('Male','Female')),
                'is_member' => $faker->boolean($chanceOfGettingTrue = 85),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
