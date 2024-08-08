<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirmPlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firm_platforms', function (Blueprint $table) {
            $table->id();

            $table->foreignId('firm_id')->constrained()->onDelete('cascade');

            $table->string('image_path')->nullable();

            $table->string('name')->nullable();

            $table->string('note')->nullable();

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
        Schema::dropIfExists('firm_platforms');
    }
}
