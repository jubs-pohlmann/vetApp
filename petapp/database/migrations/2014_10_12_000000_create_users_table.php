<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('birthdate');
            $table->string('cpf');
            $table->rememberToken();
            $table->unsignedBigInteger('super_id');
            $table->timestamps();
        });
        //Foreign key
        Schema::table('users', function (Blueprint $table) {
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
        Schema::dropIfExists('users');
    }
}
