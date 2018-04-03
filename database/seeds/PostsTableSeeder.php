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

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'January 2018 FCLLA Meeting',
            'slug' => 'january-2018-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is January 18, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is January 18, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2017-12-22 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'February 2018 FCLLA Meeting',
            'slug' => 'february-2018-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is February 15, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is February 15, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2018-01-19 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'March 2018 FCLLA Meeting',
            'slug' => 'march-2018-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is March 15, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is March 15, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2018-02-16 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'April 2018 FCLLA Meeting',
            'slug' => 'april-2018-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is April 19, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is April 19, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2018-03-16 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'May 2018 FCLLA Meeting',
            'slug' => 'may-2018-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is May 17, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is May 17, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2018-04-20 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'June 2018 FCLLA Meeting',
            'slug' => 'june-2018-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is June 21, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is June 21, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2018-05-18 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'July 2018 FCLLA Meeting',
            'slug' => 'july-2018-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is July 19, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is July 19, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2018-06-22 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'August 2018 FCLLA Meeting',
            'slug' => 'august-2018-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is August 16, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is August 16, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2018-07-20 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'September 2018 FCLLA Meeting',
            'slug' => 'september-2018-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is September 20, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is September 20, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2018-08-17 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'October 2018 FCLLA Meeting',
            'slug' => 'october-2018-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is October 18, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is October 18, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2018-09-21 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'November 2018 FCLLA Meeting',
            'slug' => 'november-2018-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is November 15, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is November 15, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2018-10-19 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
            'author_id' => 2,
            'title' => 'December 2018 FCLLA Meeting',
            'slug' => 'december-2018-fclla-meeting',
            'excerpt' => '<p>The next FCLLA meeting is December 20, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get &hellip;</p>',
            'body' => '<p>The next FCLLA meeting is December 20, 2018.</p><p>Monthly meetings are held at the Faith Church. Come join us and get tips on how to successfully manage your investment property.</p><p>The Faith Church is located at 1655 Middle Road in Conway. Meetings start at 7:00 pm.</p><p>Meetings are the THIRD THURSDAY of every month, this allows us to attend the Conway City Council meetings and protect landlord rights and concerns.</p>',
            'members_only' => 0,
            'published_at' => '2018-11-16 00:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
