<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDokumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dokument', function (Blueprint $table) {
            $table->foreign(['vyzva_idvyzva'], 'fk_dokument_vyzva1')->references(['idvyzva'])->on('vyzva')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dokument', function (Blueprint $table) {
            $table->dropForeign('fk_dokument_vyzva1');
        });
    }
}
