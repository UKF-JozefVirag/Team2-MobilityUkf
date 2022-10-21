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
            $table->string('mobilitacol', 45)->primary();
            $table->integer('Pouzivatel_idPouzivatel')->index('fk_Pouzivatel_has_vyzva_Pouzivatel1_idx');
            $table->integer('vyzva_idvyzva')->index('fk_Pouzivatel_has_vyzva_vyzva1_idx');
            $table->string('nazov', 60);
            $table->text('popis');
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
