<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentMovementProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_movement_products', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('title', 255);
            $table->foreignId('stock_id')->references('id')->on('stocks')->onDelete('cascade');
            $table->foreignId('deb_stock_id')->references('id')->on('stocks')->onDelete('cascade'); 
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
        Schema::dropIfExists('document_movement_products');
    }
}
