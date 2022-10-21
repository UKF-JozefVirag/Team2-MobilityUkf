<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVyzvaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vyzva', function (Blueprint $table) {
            $table->integer('idvyzva')->primary();
            $table->integer('typ_vyzvy_idtyp_vyzvy')->index('fk_vyzva_typ_vyzvy_idx');
            $table->integer('stav_idstav')->index('fk_vyzva_stav1_idx');
            $table->date('datum_zaciatku');
            $table->date('datum_skoncenia');
            $table->text('pokyny');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vyzva');
    }
}
