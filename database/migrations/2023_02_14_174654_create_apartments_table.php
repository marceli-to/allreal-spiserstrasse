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
    Schema::create('apartments', function (Blueprint $table) {
      $table->id();
      $table->string('number', 20);
      $table->string('location', 20)->nullable();
      $table->decimal('rooms', 4, 1);
      $table->string('type', 20);
      $table->string('street', 45);
      $table->decimal('area', 10, 0);
      $table->decimal('area_basement', 10, 0);
      $table->decimal('area_exterior', 10, 0);
      $table->decimal('price', 10, 2);
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
    Schema::dropIfExists('apartments');
  }
};
