<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVyzvaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vyzva', function (Blueprint $table) {
            $table->foreign(['fakulta_idfakulta'], 'fk_vyzva_fakulta1')->references(['idfakulta'])->on('fakulta')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['typ_vyzvy_idtyp_vyzvy'], 'fk_vyzva_typ_vyzvy1')->references(['idtyp_vyzvy'])->on('typ_vyzvy')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['stav_idstav'], 'fk_vyzva_stav1')->references(['idstav'])->on('stav')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vyzva', function (Blueprint $table) {
            $table->dropForeign('fk_vyzva_fakulta1');
            $table->dropForeign('fk_vyzva_typ_vyzvy1');
            $table->dropForeign('fk_vyzva_stav1');
        });
    }
}
