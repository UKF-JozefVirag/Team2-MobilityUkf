<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMobilitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mobilita', function (Blueprint $table) {
            $table->foreign(['vyzva_idvyzva'], 'fk_Pouzivatel_has_vyzva_vyzva1')->references(['idvyzva'])->on('vyzva')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Pouzivatel_idPouzivatel'], 'fk_Pouzivatel_has_vyzva_Pouzivatel1')->references(['idPouzivatel'])->on('pouzivatel')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mobilita', function (Blueprint $table) {
            $table->dropForeign('fk_Pouzivatel_has_vyzva_vyzva1');
            $table->dropForeign('fk_Pouzivatel_has_vyzva_Pouzivatel1');
        });
    }
}
