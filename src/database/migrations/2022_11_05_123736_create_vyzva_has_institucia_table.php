<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVyzvaHasInstituciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vyzva_has_institucia', function (Blueprint $table) {
            $table->integer('vyzva_id')->index('fk_vyzva_has_institucia_vyzva1_idx');
            $table->integer('institucia_id')->index('fk_vyzva_has_institucia_institucia1_idx');
            $table->integer('id', true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vyzva_has_institucia');
    }
}
