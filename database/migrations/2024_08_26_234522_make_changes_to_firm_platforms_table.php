<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeChangesToFirmPlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('firm_platforms', function (Blueprint $table) {

            $table->dropColumn(['image_path','name','note','deleted_at','created_at','updated_at']);

            $table->foreignId('platform_id')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('firm_platforms', function (Blueprint $table) {
            //
        });
    }
}
