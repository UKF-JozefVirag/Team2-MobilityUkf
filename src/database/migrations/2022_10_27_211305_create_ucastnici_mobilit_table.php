<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUcastniciMobilitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ucastnici_mobilit', function (Blueprint $table) {
            $table->integer('id_ucastnicimobilit', true);
            $table->integer('pouzivatel_idpouzivatel')->index('fk_pouzivatel_has_mobilita_pouzivatel1_idx');
            $table->integer('mobilita_idmobilita')->index('fk_pouzivatel_has_mobilita_mobilita1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ucastnici_mobilit');
    }
}
