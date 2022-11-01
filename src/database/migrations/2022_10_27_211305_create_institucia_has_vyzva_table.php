<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituciaHasVyzvaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institucia_has_vyzva', function (Blueprint $table) {
            $table->integer('id_vyzvyinstitucii', true);
            $table->integer('institucia_idinstitucia')->index('fk_institucia_has_vyzva_institucia1_idx');
            $table->integer('vyzva_idvyzva')->index('fk_institucia_has_vyzva_vyzva1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institucia_has_vyzva');
    }
}
