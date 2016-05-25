<?php

use Carbon\Carbon;
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
            'author_id' => 2,
            'title' => 'January FCLLA Meeting',
            'slug' => 'january-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is January 15, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is January 15, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faulkner County Library is located at 1900 Tyler St. in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'February FCLLA Meeting',
            'slug' => 'february-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is February 18, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is February 18, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faulkner County Library is located at 1900 Tyler St. in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'March FCLLA Meeting',
            'slug' => 'march-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is March 17, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is March 17, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faulkner County Library is located at 1900 Tyler St. in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'April FCLLA Meeting',
            'slug' => 'april-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is April 21, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is April 21, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faulkner County Library is located at 1900 Tyler St. in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'May FCLLA Meeting',
            'slug' => 'may-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is May 19, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is May 19, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faulkner County Library is located at 1900 Tyler St. in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'June FCLLA Meeting',
            'slug' => 'june-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is June 16, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is June 16, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faulkner County Library is located at 1900 Tyler St. in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


    }
}
