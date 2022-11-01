<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUcastniciMobilitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ucastnici_mobilit', function (Blueprint $table) {
            $table->foreign(['mobilita_idmobilita'], 'fk_pouzivatel_has_mobilita_mobilita1')->references(['idmobilita'])->on('mobilita')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['pouzivatel_idpouzivatel'], 'fk_pouzivatel_has_mobilita_pouzivatel1')->references(['idpouzivatel'])->on('pouzivatel')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ucastnici_mobilit', function (Blueprint $table) {
            $table->dropForeign('fk_pouzivatel_has_mobilita_mobilita1');
            $table->dropForeign('fk_pouzivatel_has_mobilita_pouzivatel1');
        });
    }
}
