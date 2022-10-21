<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVyzvaDokumentyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vyzva_dokumenty', function (Blueprint $table) {
            $table->foreign(['vyzva_idvyzva'], 'fk_vyzva_dokumenty_vyzva1')->references(['idvyzva'])->on('vyzva')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vyzva_dokumenty', function (Blueprint $table) {
            $table->dropForeign('fk_vyzva_dokumenty_vyzva1');
        });
    }
}
