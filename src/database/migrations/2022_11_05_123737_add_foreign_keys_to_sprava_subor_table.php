<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSpravaSuborTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sprava_subor', function (Blueprint $table) {
            $table->foreign(['subor_id'], 'fk_sprava_subor_subor1')->references(['id'])->on('subor')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['sprava_id'], 'fk_sprava_subor_sprava')->references(['id'])->on('sprava')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sprava_subor', function (Blueprint $table) {
            $table->dropForeign('fk_sprava_subor_subor1');
            $table->dropForeign('fk_sprava_subor_sprava');
        });
    }
}
