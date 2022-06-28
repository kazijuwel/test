<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('seller_id')->nullable();
            $table->integer('order_id')->nullable();
            $table->integer('order_item_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('purchase_quentity')->nullable();
            $table->integer('sale_quentity')->nullable();
            $table->integer('purchase_vouchar_id')->nullable();
            $table->integer('sale_voucher_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('stock_quentity')->nullable();
            $table->integer('type')->nullable();
            $table->integer('store_id')->nullable();
            $table->integer('editedby_id')->nullable();
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
        Schema::dropIfExists('inventories');
    }
}
