<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserOperacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_operacion', function (Blueprint $table) {
          $table->integer('user_id')->unsigned();
          $table->integer('operacion_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('operacion_id')->references('id')->on('operacions');

          $table->rememberToken();
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
        Schema::dropIfExists('user_operacion');
    }
}
