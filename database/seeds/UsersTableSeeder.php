<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Nathon Shultz',
            'email' => 'nashultz07@gmail.com',
            'password' => bcrypt('secret'),
            'admin' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'FCLLA Team',
            'email' => 'nathon@nathonshultz.com',
            'password' => bcrypt('secret'),
            'admin' => 0
        ]);
    }
}
