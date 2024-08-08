<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirmAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firm_abouts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('firm_id')->constrained()->onDelete('cascade');
            $table->string('chief_executive_officer')->nullable();
            $table->string('trust_pilot')->nullable();
            $table->boolean('more_than_5_platforms')->default(0);
            $table->string('commission_strucuture_link')->nullable();
            $table->longText('description')->nullable();

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
        Schema::dropIfExists('firm_abouts');
    }
}
