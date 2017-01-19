<?php

use Carbon\Carbon;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::dropIfExists('posts');
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id');
            $table->string('title');
            $table->string('slug');
            $table->text('body');
            $table->text('excerpt');
            $table->tinyInteger('members_only')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'January 2016 FCLLA Meeting',
            'slug' => 'january-2016-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is January 15, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is January 15, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faulkner County Library is located at 1900 Tyler St. in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2015-12-18 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'February 2016 FCLLA Meeting',
            'slug' => 'february-2016-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is February 18, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is February 18, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faulkner County Library is located at 1900 Tyler St. in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2016-01-16 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'March 2016 FCLLA Meeting',
            'slug' => 'march-2016-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is March 17, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is March 17, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faulkner County Library is located at 1900 Tyler St. in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2016-02-19 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'April 2016 FCLLA Meeting',
            'slug' => 'april-2016-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is April 21, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is April 21, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faulkner County Library is located at 1900 Tyler St. in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2016-03-18 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'May 2016 FCLLA Meeting',
            'slug' => 'may-2016-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is May 19, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is May 19, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faulkner County Library is located at 1900 Tyler St. in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2016-04-22 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'June 2016 FCLLA Meeting',
            'slug' => 'june-2016-fclla-meeting',
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
            'title' => 'July 2016 FCLLA Meeting',
            'slug' => 'july-2016-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is July 21, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is July 21, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faulkner County Library is located at 1900 Tyler St. in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2016-06-17 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'August 2016 FCLLA Meeting',
            'slug' => 'august-2016-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is August 18, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is August 18, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faulkner County Library is located at 1900 Tyler St. in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2016-07-22 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'September 2016 FCLLA Meeting',
            'slug' => 'september-2016-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is September 15, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is September 15, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faulkner County Library is located at 1900 Tyler St. in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2016-08-19 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'October 2016 FCLLA Meeting',
            'slug' => 'october-2016-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is October 20, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is October 20, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faulkner County Library is located at 1900 Tyler St. in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2016-09-16 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'November 2016 FCLLA Meeting',
            'slug' => 'november-2016-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is November 17, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is November 17, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faulkner County Library is located at 1900 Tyler St. in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2016-10-21 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'December 2016 FCLLA Meeting',
            'slug' => 'december-2016-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is December 15, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is December 15, 2016.</p><p>Monthly meetings are held at the Faulkner County Library. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faulkner County Library is located at 1900 Tyler St. in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2016-11-18 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'January 2017 FCLLA Meeting',
            'slug' => 'january-2017-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is January 19, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is January 19, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2016-12-16 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'February 2017 FCLLA Meeting',
            'slug' => 'february-2017-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is February 16, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is February 16, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2017-01-20 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'March 2017 FCLLA Meeting',
            'slug' => 'march-2017-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is March 16, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is March 16, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2017-02-17 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'April 2017 FCLLA Meeting',
            'slug' => 'april-2017-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is April 20, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is April 20, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2017-03-17 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'May 2017 FCLLA Meeting',
            'slug' => 'may-2017-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is May 18, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is May 18, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2017-04-21 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'June 2017 FCLLA Meeting',
            'slug' => 'june-2017-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is June 15, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is June 15, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2017-05-19 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'July 2017 FCLLA Meeting',
            'slug' => 'july-2017-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is July 20, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is July 20, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2017-06-16 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'August 2017 FCLLA Meeting',
            'slug' => 'august-2017-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is August 17, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is August 17, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2017-07-21 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'September 2017 FCLLA Meeting',
            'slug' => 'september-2017-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is September 21, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is September 21, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2017-08-18 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'October 2017 FCLLA Meeting',
            'slug' => 'october-2017-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is October 19, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is October 19, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2017-09-22 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'November 2017 FCLLA Meeting',
            'slug' => 'november-2017-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is November 16, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is November 16, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2017-10-20 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'December 2017 FCLLA Meeting',
            'slug' => 'december-2017-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is December 21, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is December 21, 2017.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2017-11-17 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
