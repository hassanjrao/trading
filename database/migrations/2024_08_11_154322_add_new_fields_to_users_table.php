<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['trading_experience', 'firm_challenge']);

            $table->foreignId('trading_experience_id')->nullable()->constrained('trading_experiences');
            $table->foreignId('prop_firm_challenge_id')->nullable()->constrained('prop_firm_challenges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('trading_experience')->nullable();
            $table->boolean('firm_challenge')->default(false);

            $table->dropForeign(['trading_experience_id']);
            $table->dropColumn('trading_experience_id');

            $table->dropForeign(['prop_firm_challenge_id']);
            $table->dropColumn('prop_firm_challenge_id');
        });
    }
}
