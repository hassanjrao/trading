<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLinkedinUrlInFirmAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('firm_abouts', function (Blueprint $table) {

            $table->string('linkedin_url')->nullable();
            $table->string('trustpilot_url')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('firm_abouts', function (Blueprint $table) {
            $table->dropColumn('linkedin_url');
            $table->dropColumn('trustpilot_url');
        });
    }
}
