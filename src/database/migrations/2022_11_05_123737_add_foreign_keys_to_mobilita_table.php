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
            $table->foreign(['vyzva_id'], 'fk_mobilita_vyzva1')->references(['id'])->on('vyzva')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['sprava_id'], 'fk_mobilita_sprava1')->references(['id'])->on('sprava')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
            $table->dropForeign('fk_mobilita_vyzva1');
            $table->dropForeign('fk_mobilita_sprava1');
        });
    }
}
