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
            'published_at' => '2015-12-18 00:00:00',
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
            'published_at' => '2016-01-16 00:00:00',
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
            'published_at' => '2016-02-19 00:00:00',
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
            'published_at' => '2016-03-18 00:00:00',
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
            'published_at' => '2016-04-22 00:00:00',
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
            'published_at' => '2016-05-20 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'Thank you from FCLLA',
            'slug' => 'thank-you-from-fclla',
            'excerpt' => '<p>Thank you to those of you that remembered to renew your annual membership by sending or bringing payment &hellip;</p>',
            'body' => '<p>Thank you to those of you that remembered to renew your annual membership by sending or bringing payment of $50.00 to the meeting. We now have a success story on using the documentation to evict a tenant legally without the use of an expensive attorney.</p><p>Even if you don\'t want to renew, please consider a donation to the Political Action Fund so the state Association can continue to pay the lobbyist who have "saved" us landlords on several close decisions by our legislature.</p>',
            'members_only' => 1,
            'published_at' => '2016-03-25 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'July FCLLA Meeting',
            'slug' => 'july-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is July 21, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is July 21, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faulkner County Library is located at 1900 Tyler St. in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2016-06-17 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
