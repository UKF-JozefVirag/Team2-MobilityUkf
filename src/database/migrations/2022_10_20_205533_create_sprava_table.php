<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpravaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprava', function (Blueprint $table) {
            $table->integer('idsprava')->primary();
            $table->string('mobilita_mobilitacol', 45)->index('fk_sprava_mobilita1_idx');
            $table->string('nazov', 45);
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
        Schema::dropIfExists('sprava');
    }
}
