<?php

use Illuminate\Database\Seeder;

class ApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applications')->insert([
            'bname' => 'FCLLA Team',
            'name' => 'Nathon Shultz',
            'address' => 'Some Address',
            'city' => 'Conway',
            'state' => 'AR',
            'zipcode' => '72034',
            'cphone' => '5019089587',
            'email' => 'nathon@nathonshultz.com',
            'units' => 2,
            'membership' => 0,
            'roster' => 0
        ]);
    }
}
