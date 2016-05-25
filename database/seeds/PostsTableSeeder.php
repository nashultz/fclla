<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'author_id' => 0,
            'title' => 'January FCLLA Meeting',
            'slug' => 'january-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is January 15, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is January 15, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faulkner County Library is located at 1900 Tyler St. in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2015-12-03 00:00:00',
            'created_at' => '2015-01-01 00:00:00',
            'updated_at' => '2015-01-01 00:00:00'
        ]);
    }
}
