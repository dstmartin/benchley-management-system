<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create(array(
            'name'      => 'Donald St. Martin',
            'username'  => 'dstmartin',
            'email'     => 'dstmartin3@gmail.com',
            'password'  => Hash::make('password'),
        ));
    }
}
