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
            'id' => '0',
            'name' => 'FCLLA Team',
            'email' => 'nathon@nathonshultz.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'id' => '1',
            'name' => 'Nathon Shultz',
            'email' => 'nashultz07@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
