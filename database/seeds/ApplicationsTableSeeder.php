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
            'name' => 'Jessica Burrier',
            'address' => '2115 Washington Ave',
            'city' => 'Conway',
            'state' => 'AR',
            'zipcode' => '72032',
            'cphone' => '5012697353',
            'email' => 'jessica@fclla.org',
            'units' => 0,
            'membership' => 0,
            'roster' => 0
        ]);
    }
}
