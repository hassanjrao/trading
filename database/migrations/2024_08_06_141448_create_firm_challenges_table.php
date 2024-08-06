<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirmChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firm_challenges', function (Blueprint $table) {
            $table->id();

            $table->foreignId('firm_id')->constrained();

            $table->string('actual_price')->nullable();
            $table->string('actual_price_note')->nullable();

            $table->string('before_price')->nullable();

            $table->foreignId('account_size_id')->constrained()->nullable();

            $table->foreignId('step_id')->constrained()->nullable();

            $table->text('profit_target')->nullable();


            $table->text('max_daily_loss')->nullable();
            $table->text('max_daily_loss_note')->nullable();
            $table->text('max_total_drawdown')->nullable();
            $table->text('activation_fee')->nullable();
            $table->text('rewards')->nullable();


            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('firm_challenges');
    }
}
