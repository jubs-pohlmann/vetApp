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
            $table->string('name');
            $table->string('rating')->nullable();
            $table->string('photo');
            $table->string('phone');
            $table->string('address');
            $table->string('email');
            $table->string('password');
            $table->string('cnpj');
            $table->boolean('delivery');
            $table->unsignedBigInteger('account_id')->nullable();
            $table->timestamps();
        });

        //Foreign key
        Schema::table('stores', function (Blueprint $table) {
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
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
