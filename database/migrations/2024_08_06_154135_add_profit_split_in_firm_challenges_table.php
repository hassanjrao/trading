<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfitSplitInFirmChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('firm_challenges', function (Blueprint $table) {
            $table->string('profit_split')->nullable()->after('firm_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('firm_challenges', function (Blueprint $table) {
            $table->dropColumn('profit_split');
        });
    }
}
