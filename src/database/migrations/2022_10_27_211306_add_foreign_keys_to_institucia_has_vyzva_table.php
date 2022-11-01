<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToInstituciaHasVyzvaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('institucia_has_vyzva', function (Blueprint $table) {
            $table->foreign(['institucia_idinstitucia'], 'fk_institucia_has_vyzva_institucia1')->references(['idinstitucia'])->on('institucia')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['vyzva_idvyzva'], 'fk_institucia_has_vyzva_vyzva1')->references(['idvyzva'])->on('vyzva')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('institucia_has_vyzva', function (Blueprint $table) {
            $table->dropForeign('fk_institucia_has_vyzva_institucia1');
            $table->dropForeign('fk_institucia_has_vyzva_vyzva1');
        });
    }
}
