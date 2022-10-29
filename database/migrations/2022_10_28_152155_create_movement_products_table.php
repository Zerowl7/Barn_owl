<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movement_products', function (Blueprint $table) {
            $table->id();
            $table->integer('amt');
            $table->bigInteger('doc_id')->index('doc_id');
            $table->string('doc_type')->index('doc_type');
            $table->foreignId('stock_id')->references('id')->on('stocks')->onDelete('cascade');
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('movement_products');
    }
}
