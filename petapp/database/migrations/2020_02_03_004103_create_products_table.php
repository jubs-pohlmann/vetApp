<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('photo');
            $table->string('name');
            $table->string('price');
            $table->string('category');
            $table->longText('description');
            $table->string('animal');
            $table->integer('stock');
            $table->boolean('status_stock');
            $table->unsignedBigInteger('store_id')->nullable();
            $table->timestamps();
        });

        //Foreign key
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
