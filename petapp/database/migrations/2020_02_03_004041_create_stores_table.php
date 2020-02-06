<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rating')->nullable();
            $table->string('cnpj');
            $table->boolean('delivery');
            $table->unsignedBigInteger('super_id');
            $table->timestamps();
        });

        //Foreign key
        Schema::table('stores', function (Blueprint $table) {
            $table->foreign('super_id')->references('id')->on('supers')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
