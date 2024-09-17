<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MakeChangesInFirmCommissionStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // truncate table
        // DB::table('firm_commission_structures')->truncate();
        Schema::table('firm_commission_structures', function (Blueprint $table) {

            // $table->dropColumn([
            //     'image_path','name','points'
            // ]);

            // $table->foreignId('commission_structure_id')->constrained('commission_structures')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('firm_commission_structures', function (Blueprint $table) {
            $table->string('image_path');
            $table->string('name');
            $table->integer('points');
            $table->dropForeign(['commission_structure_id']);
            $table->dropColumn('commission_structure_id');
        });
    }
}
