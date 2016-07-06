<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password', 60)->change();
            $table->text('photo_url')->nullable();
            $table->tinyInteger('uses_two_factor_auth')->default(0);
            $table->string('authy_id')->nullable();
            $table->string('country_code', 10)->nullable();
            $table->string('phone', 25)->nullable();
            $table->string('two_factor_reset_code', 100)->nullable();
            $table->integer('current_team_id')->nullable();
            $table->string('stripe_id')->nullable()->change();
            $table->string('current_billing_plan')->nullable();
            $table->string('card_brand')->nullable()->change();
            $table->string('card_last_four')->nullable()->change();
            $table->string('card_country')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_address_line_2')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_zip', 25)->nullable();
            $table->string('billing_country', 2)->nullable();
            $table->string('vat_id', 50)->nullable();
            $table->text('extra_billing_information')->nullable();
            $table->timestamp('trial_ends_at')->nullable()->change();
            $table->timestamp('last_read_announcements_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table)
        {
            $table->string('password')->change();
            $table->dropColumn(['photo_url', 'uses_two_factor_auth', 'authy_id', 'country_code', 'phone', 'two_factor_reset_code', 'current_team_id', 'stripe_id', 'current_billing_plan', 'card_brand', 'card_last_four', 'card_country', 'billing_address', 'billing_address_line_2', 'billing_city', 'billing_state', 'billing_zip', 'billing_country', 'vat_id', 'extra_billing_information', 'trial_ends_at', 'last_read_announcements_at']);
        });
    }
}
