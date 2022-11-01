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
            $table->integer('idpouzivatel', true);
            $table->string('meno', 60);
            $table->string('priezvisko', 60);
            $table->string('login', 60);
            $table->string('heslo', 60);
            $table->integer('rola_idrola')->index('fk_pouzivatel_rola1_idx');
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
