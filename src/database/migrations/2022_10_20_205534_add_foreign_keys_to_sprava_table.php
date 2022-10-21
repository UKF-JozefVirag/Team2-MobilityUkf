<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSpravaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sprava', function (Blueprint $table) {
            $table->foreign(['mobilita_mobilitacol'], 'fk_sprava_mobilita1')->references(['mobilitacol'])->on('mobilita')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sprava', function (Blueprint $table) {
            $table->dropForeign('fk_sprava_mobilita1');
        });
    }
}
