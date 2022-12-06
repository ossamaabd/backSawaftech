<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('OrderId')->unsigned();
            $table->foreign('OrderId')->references('id')->on('orders');
            $table->bigInteger('ProductId')->unsigned();
            $table->foreign('ProductId')->references('id')->on('products');

            $table->decimal('UnitPrice' ,12,2);
            $table->integer('Quantity');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
