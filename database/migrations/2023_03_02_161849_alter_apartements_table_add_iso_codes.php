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
      Schema::table('apartments', function (Blueprint $table) {
        $table->text('iso_code_view_1')->nullable()->after('price');
        $table->text('iso_code_view_2')->nullable()->after('iso_code_view_1');
        $table->text('iso_code_view_3')->nullable()->after('iso_code_view_2');
        $table->text('iso_code_view_4')->nullable()->after('iso_code_view_3');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('apartments', function (Blueprint $table) {
        $table->dropColumn('iso_code_view_1');
        $table->dropColumn('iso_code_view_2');
        $table->dropColumn('iso_code_view_3');
        $table->dropColumn('iso_code_view_4');
      });
    }
};
