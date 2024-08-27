<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangesToFirmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('firms', function (Blueprint $table) {
            $table->dropForeign(['account_size_id']);
            $table->dropColumn('account_size_id');

            $table->dropForeign(['step_id']);
            $table->dropColumn(['step_id','rewards']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('firms', function (Blueprint $table) {
            $table->unsignedBigInteger('account_size_id')->nullable();
            $table->foreign('account_size_id')->references('id')->on('account_sizes');

            $table->unsignedBigInteger('step_id')->nullable();
            $table->foreign('step_id')->references('id')->on('steps');
            $table->text('rewards')->nullable();
        });
    }
}
