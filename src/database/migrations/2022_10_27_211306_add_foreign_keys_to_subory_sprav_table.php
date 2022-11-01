<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSuborySpravTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subory_sprav', function (Blueprint $table) {
            $table->foreign(['sprava_idsprava'], 'fk_sprava_has_subor_sprava')->references(['idsprava'])->on('sprava')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['subor_idsubor'], 'fk_sprava_has_subor_subor1')->references(['idsubor'])->on('subor')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subory_sprav', function (Blueprint $table) {
            $table->dropForeign('fk_sprava_has_subor_sprava');
            $table->dropForeign('fk_sprava_has_subor_subor1');
        });
    }
}
