<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePouzivatelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pouzivatel', function (Blueprint $table) {
            $table->integer('idPouzivatel')->primary();
            $table->integer('rola_idrola')->index('fk_Pouzivatel_rola1_idx');
            $table->string('meno', 60);
            $table->string('priezvisko', 60);
            $table->string('adresa', 45);
            $table->string('login', 50);
            $table->string('heslo', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pouzivatel');
    }
}
