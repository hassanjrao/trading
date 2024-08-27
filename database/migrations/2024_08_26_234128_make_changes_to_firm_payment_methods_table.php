<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeChangesToFirmPaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('firm_payment_methods', function (Blueprint $table) {
            $table->dropColumn(['image_path','name','deleted_at','created_at','updated_at']);

            $table->foreignId('payment_method_id')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('firm_payment_methods', function (Blueprint $table) {
            //
        });
    }
}
