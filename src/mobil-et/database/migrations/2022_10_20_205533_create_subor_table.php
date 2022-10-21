<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuborTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subor', function (Blueprint $table) {
            $table->integer('sprava_idsprava')->index('fk_subor_sprava1_idx');
            $table->integer('idsubor')->primary();
            $table->string('nazov', 45);
            $table->string('typ', 45);
            $table->string('url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subor');
    }
}
