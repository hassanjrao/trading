<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirmReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firm_reviews', function (Blueprint $table) {
            $table->id();

            $table->foreignId('firm_id')->constrained()->onDelete('cascade');

            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->foreignId('account_size_id')->constrained('account_sizes');

            $table->foreignId('step_id')->constrained('steps');

            $table->longText('review')->nullable();

            $table->integer('rating_dashboard')->default(0);
            $table->integer('rating_support_team')->default(0);
            $table->integer('rating_payout_process')->default(0);
            $table->integer('rating_rules')->default(0);
            $table->integer('rating_general')->default(0);


            $table->string('order_confirmation_path')->nullable();

            $table->longText('main_advantages')->nullable();

            $table->longText('main_disadvantages')->nullable();

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
        Schema::dropIfExists('firm_reviews');
    }
}
