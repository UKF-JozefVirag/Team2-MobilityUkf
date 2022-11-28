<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobilita', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nazov', 100);
            $table->text('popis');
            $table->integer('sprava_id')->index('fk_mobilita_sprava1_idx')->nullable();
            $table->integer('vyzva_id')->index('fk_mobilita_vyzva1_idx')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobilita');
    }
}
