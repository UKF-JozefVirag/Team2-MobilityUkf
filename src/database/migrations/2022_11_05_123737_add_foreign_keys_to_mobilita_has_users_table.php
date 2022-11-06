<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMobilitaHasUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mobilita_has_users', function (Blueprint $table) {
            $table->foreign(['users_id'], 'fk_mobilita_has_users_users1')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['mobilita_id'], 'fk_mobilita_has_users_mobilita1')->references(['id'])->on('mobilita')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mobilita_has_users', function (Blueprint $table) {
            $table->dropForeign('fk_mobilita_has_users_users1');
            $table->dropForeign('fk_mobilita_has_users_mobilita1');
        });
    }
}
