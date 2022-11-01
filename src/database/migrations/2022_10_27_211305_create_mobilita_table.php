<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobilita', function (Blueprint $table) {
            $table->integer('idmobilita', true);
            $table->string('nazov', 80);
            $table->text('popis');
            $table->integer('sprava_idsprava')->index('fk_mobilita_sprava1_idx');
            $table->integer('vyzva_idvyzva')->index('fk_mobilita_vyzva1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobilita');
    }
}
