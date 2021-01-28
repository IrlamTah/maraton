<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'name' => 'Irlam',
           'email' => 'irlam.tah@gmail.com',
           'phone' => '1234',
           'password'=> bcrypt('123456'),
           'admin' => false
        ]);
        DB::table('users')->insert([
            'name' => 'techer',
            'email' => 'techer@gmail.com',
            'phone' => '123',
            'password'=> bcrypt('12345678'),
            'admin' => true
        ]);

    }
}
