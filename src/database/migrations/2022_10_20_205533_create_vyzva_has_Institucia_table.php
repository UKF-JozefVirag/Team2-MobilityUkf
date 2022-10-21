<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVyzvaHasInstituciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vyzva_has_Institucia', function (Blueprint $table) {
            $table->integer('vyzva_idvyzva')->index('fk_vyzva_has_Institucia_vyzva1_idx');
            $table->integer('Institucia_idInstitucia')->index('fk_vyzva_has_Institucia_Institucia1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vyzva_has_Institucia');
    }
}
