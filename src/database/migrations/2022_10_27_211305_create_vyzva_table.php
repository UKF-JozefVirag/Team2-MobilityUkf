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
            $table->integer('idvyzva', true);
            $table->date('datum_od');
            $table->date('datum_do');
            $table->text('pokyny');
            $table->integer('stav_idstav')->index('fk_vyzva_stav1_idx');
            $table->integer('typ_vyzvy_idtyp_vyzvy')->index('fk_vyzva_typ_vyzvy1_idx');
            $table->integer('fakulta_idfakulta')->index('fk_vyzva_fakulta1_idx');
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
