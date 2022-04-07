<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_product', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger('cart_id');
//            $table->unsignedBigInteger('product_id');
//            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
//            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreignId('cart_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('size')->default("free");
            $table->string('color');
            $table->unsignedBigInteger('quantity')->default(1);
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
        Schema::dropIfExists('cart_product');
    }
};
