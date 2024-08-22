<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangesInFirmChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('firm_challenges', function (Blueprint $table) {

            $table->dropColumn([
                'profit_target',
                'max_daily_loss',
                'max_daily_loss_note',
                'max_total_drawdown'
            ]);

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
            $table->decimal('profit_target', 10, 2)->nullable();
            $table->decimal('max_daily_loss', 10, 2)->nullable();
            $table->text('max_daily_loss_note')->nullable();
            $table->decimal('max_total_drawdown', 10, 2)->nullable();
        });
    }
}
