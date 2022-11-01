<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPouzivatelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pouzivatel', function (Blueprint $table) {
            $table->foreign(['rola_idrola'], 'fk_pouzivatel_rola1')->references(['idrola'])->on('rola')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pouzivatel', function (Blueprint $table) {
            $table->dropForeign('fk_pouzivatel_rola1');
        });
    }
}
