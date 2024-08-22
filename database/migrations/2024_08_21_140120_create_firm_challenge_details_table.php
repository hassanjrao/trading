<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirmChallengeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firm_challenge_details', function (Blueprint $table) {
            $table->id();

            $table->foreignId('firm_challenge_id')->constrained()->onDelete('cascade');

            $table->string('profit_target')->nullable();

            $table->string('max_daily_loss')->nullable();

            $table->text('max_daily_loss_note')->nullable();

            $table->string('max_total_drawdown')->nullable();

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
        Schema::dropIfExists('firm_challenge_details');
    }
}
