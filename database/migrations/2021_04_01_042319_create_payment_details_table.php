<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status_code');
            $table->string('status_message');
            $table->string('bank');
            $table->string('transaction_id');
            $table->string('order_id'); //ini sama dengan invoice_order
            $table->double('gross_amount');
            $table->string('payment_type');
            $table->dateTime('transaction_time');
            $table->string('transaction_status');
            $table->string('fraud_status');
            $table->string('masked_card');
            $table->string('card_type');
            $table->string('store');


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
        Schema::dropIfExists('payment_details');
    }
}
