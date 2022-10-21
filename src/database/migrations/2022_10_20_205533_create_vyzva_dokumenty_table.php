<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVyzvaDokumentyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vyzva_dokumenty', function (Blueprint $table) {
            $table->integer('idvyzva_dokumenty')->primary();
            $table->string('dokument', 45);
            $table->integer('vyzva_idvyzva')->index('fk_vyzva_dokumenty_vyzva1_idx');
            $table->text('detail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vyzva_dokumenty');
    }
}
