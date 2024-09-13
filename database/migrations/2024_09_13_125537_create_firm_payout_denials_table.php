<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirmPayoutDenialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firm_payout_denials', function (Blueprint $table) {
            $table->id();

            $table->foreignId('firm_id')->constrained()->onDelete('cascade');

            $table->string('funding_certificate')->nullable();

            $table->string('refusing_payout_reason')->nullable();

            $table->string('payout_more_details')->nullable();

            $table->string('correspondence')->nullable();

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
        Schema::dropIfExists('firm_payout_denials');
    }
}
