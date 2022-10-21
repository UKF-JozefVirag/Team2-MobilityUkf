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
            $table->integer('idInstitucia')->primary();
            $table->integer('typ_institucie_idtyp_institucie')->index('fk_Institucia_typ_institucie1_idx');
            $table->integer('krajina_idkrajina')->index('fk_Institucia_krajina1_idx');
            $table->string('nazov', 100);
            $table->string('mesto', 80);
            $table->string('adresa', 100);
            $table->date('zmluva_od');
            $table->date('zmluva_do');
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
