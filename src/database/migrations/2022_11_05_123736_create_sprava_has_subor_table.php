<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpravaHasSuborTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprava_has_subor', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('sprava_id')->index('fk_sprava_has_subor_sprava_idx');
            $table->integer('subor_id')->index('fk_sprava_has_subor_subor1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sprava_has_subor');
    }
}
