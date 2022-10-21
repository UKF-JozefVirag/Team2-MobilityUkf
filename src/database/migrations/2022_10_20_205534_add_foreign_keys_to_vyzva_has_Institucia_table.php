<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVyzvaHasInstituciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vyzva_has_Institucia', function (Blueprint $table) {
            $table->foreign(['vyzva_idvyzva'], 'fk_vyzva_has_Institucia_vyzva1')->references(['idvyzva'])->on('vyzva')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Institucia_idInstitucia'], 'fk_vyzva_has_Institucia_Institucia1')->references(['idInstitucia'])->on('institucia')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vyzva_has_Institucia', function (Blueprint $table) {
            $table->dropForeign('fk_vyzva_has_Institucia_vyzva1');
            $table->dropForeign('fk_vyzva_has_Institucia_Institucia1');
        });
    }
}
