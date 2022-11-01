<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToInstituciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('institucia', function (Blueprint $table) {
            $table->foreign(['krajina_idkrajina'], 'fk_institucia_krajina1')->references(['idkrajina'])->on('krajina')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['typ_institucie_idtyp_institucie'], 'fk_institucia_typ_institucie1')->references(['idtyp_institucie'])->on('typ_institucie')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('institucia', function (Blueprint $table) {
            $table->dropForeign('fk_institucia_krajina1');
            $table->dropForeign('fk_institucia_typ_institucie1');
        });
    }
}
