<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReviewUsefulInFirmReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('firm_reviews', function (Blueprint $table) {

            $table->integer('review_useful_count')->default(0);
            $table->integer('review_not_useful_count')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('firm_reviews', function (Blueprint $table) {

            $table->dropColumn('review_useful_count');
            $table->dropColumn('review_not_useful_count');
        });
    }
}
