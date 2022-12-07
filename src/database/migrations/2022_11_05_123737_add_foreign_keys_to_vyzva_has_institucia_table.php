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
        Schema::table('vyzva_has_institucia', function (Blueprint $table) {
            $table->foreign(['vyzva_id'], 'fk_vyzva_has_institucia_vyzva1')->references(['id'])->on('vyzva')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign(['institucia_id'], 'fk_vyzva_has_institucia_institucia1')->references(['id'])->on('institucia')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vyzva_has_institucia', function (Blueprint $table) {
            $table->dropForeign('fk_vyzva_has_institucia_vyzva1');
            $table->dropForeign('fk_vyzva_has_institucia_institucia1');
        });
    }
}
