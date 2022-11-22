<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('county_id');
            $table->unsignedBigInteger('subcounty_id');
            $table->unsignedBigInteger('ward_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('postal_code')->nullable();
            $table->text('notes')->nullable();
            $table->string('payment_type');
            $table->string('payment_method')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('currency');
            $table->float('amount',8,2);
            $table->string('order_number')->nullable();
            $table->string('invoce_no');
            $table->string('order_date');
            $table->string('order_month');
            $table->string('order_year');
            $table->string('confirmed_date')->nullable();
            $table->string('processing_date')->nullable();
            $table->string('picked_date')->nullable();
            $table->string('shipped_date')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('canceled_date')->nullable();
            $table->string('returned_date')->nullable();
            $table->string('returned_reason')->nullable();
            $table->string('status');
            $table->string('FirstName')->nullable();
            $table->string('MiddleName')->nullable();
            $table->string('LastName')->nullable();
            $table->string('TransactionType')->nullable();
            $table->string('TransID')->nullable();
            $table->string('TransTime')->nullable();
            $table->string('BusinessShortCode')->nullable();
            $table->string('BillRefNumber')->nullable();
            $table->string('InvoiceNumber')->nullable();
            $table->string('ThirdPartyTransID')->nullable();
            $table->string('MSISDN')->nullable();
            $table->decimal('TransAmount', 8, 2)->nullable();
            $table->decimal('OrgAccountBalance', 8, 2)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
