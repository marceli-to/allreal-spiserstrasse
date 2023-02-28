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
    Schema::create('form_data', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('firstname');
      $table->string('email');
      $table->string('phone');
      $table->string('street')->nullable();
      $table->string('street_number')->nullable();
      $table->string('zip')->nullable();
      $table->string('city')->nullable();
      $table->softDeletes();
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
    Schema::dropIfExists('form_data');
  }
};
