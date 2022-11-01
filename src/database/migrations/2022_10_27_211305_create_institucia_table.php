<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institucia', function (Blueprint $table) {
            $table->integer('idinstitucia', true);
            $table->string('nazov', 100);
            $table->string('mesto', 80);
            $table->string('url_fotka', 255);
            $table->date('zmluva_od');
            $table->date('zmluva_do');
            $table->integer('krajina_idkrajina')->index('fk_institucia_krajina1_idx');
            $table->integer('typ_institucie_idtyp_institucie')->index('fk_institucia_typ_institucie1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institucia');
    }
}
