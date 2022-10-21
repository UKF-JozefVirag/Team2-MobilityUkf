<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSuborTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subor', function (Blueprint $table) {
            $table->foreign(['sprava_idsprava'], 'fk_subor_sprava1')->references(['idsprava'])->on('sprava')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subor', function (Blueprint $table) {
            $table->dropForeign('fk_subor_sprava1');
        });
    }
}
