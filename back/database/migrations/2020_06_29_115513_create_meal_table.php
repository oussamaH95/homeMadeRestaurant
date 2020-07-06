<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc')->nullable(true);
            $table->integer('small')->nullable(true);
            $table->integer('mid')->nullable(true);
            $table->integer('large')->nullable(true);
            $table->string('img')->nullable(true);
            $table->bigInteger('mealTypeId')->nullable(true);
            $table->bigInteger('menuId')->nullable(true);
            $table->bigInteger('userId');
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
        Schema::dropIfExists('meal');
    }
}
