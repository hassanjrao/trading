<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firms', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('logo_path')->nullable();
            $table->string('url')->nullable();
            $table->date('established_date')->nullable();

            $table->foreignId('asset_type_id')->constrained()->nullable();
            $table->string('profit_split')->nullable();

            $table->foreignId('technology_id')->constrained()->nullable();

            $table->boolean('direct_path_to_live_funded')->default(false);

            $table->string('payout_frequency')->nullable();
            $table->string('payout_frequency_note')->nullable();


            $table->string('daily_drawdown')->nullable();

            $table->foreignId('account_size_id')->constrained()->nullable();

            $table->foreignId('step_id')->constrained()->nullable();

            $table->string('rewards')->nullable();


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
        Schema::dropIfExists('firms');
    }
}
