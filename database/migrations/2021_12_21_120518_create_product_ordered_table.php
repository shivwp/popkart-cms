<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOrderedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_ordered', function (Blueprint $table) {
            $table->id();
             $table->integer('order_id');
            $table->integer('product_id');
            $table->string('product_name');
            $table->string('sku_id');
            $table->string('quantity');
            $table->string('product_price');
            $table->integer('user_id');
            $table->longText('discount');
             $table->integer('total_price');
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
        Schema::dropIfExists('product_ordered');
    }
}