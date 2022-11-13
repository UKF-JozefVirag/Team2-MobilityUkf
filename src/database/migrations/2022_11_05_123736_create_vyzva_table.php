<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVyzvaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vyzva', function (Blueprint $table) {
            $table->integer('id', true);
            $table->date('datum_od');
            $table->date('datum_do');
            $table->text('pokyny');
            $table->integer('rocnik');
            $table->string('url',255);
            $table->string('program',60);
            $table->integer('fakulta_id')->index('fk_vyzva_fakulta1_idx');
            $table->integer('stav_id')->index('fk_vyzva_stav1_idx');
            $table->integer('typ_vyzvy_id')->index('fk_vyzva_typ_vyzvy1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vyzva');
    }
}
