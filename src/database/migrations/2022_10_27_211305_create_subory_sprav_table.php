<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuborySpravTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subory_sprav', function (Blueprint $table) {
            $table->integer('id_suborysprav', true);
            $table->integer('sprava_idsprava')->index('fk_sprava_has_subor_sprava_idx');
            $table->integer('subor_idsubor')->index('fk_sprava_has_subor_subor1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subory_sprav');
    }
}
