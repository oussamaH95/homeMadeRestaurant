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
            $table->id()->bigIncrements;
            $table->string('name')->unique(true);
            $table->string('password');
            $table->string('desc')->nullable(true);
            $table->string('about')->nullable(true);
            $table->string('phoneNumber')->nullable(true);
            $table->string('addressDetails')->nullable(true);
            $table->string('restName')->nullable(true);
            $table->date('sinceDate')->nullable(true);
            $table->bigInteger('cityId')->nullable(true);
            $table->rememberToken()->nullable(true);
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
        Schema::dropIfExists('users');
    }
}
