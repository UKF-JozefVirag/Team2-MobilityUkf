<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilitaHasUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobilita_has_users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('mobilita_id')->index('fk_mobilita_has_users_mobilita1_idx');
            $table->integer('users_id')->index('fk_mobilita_has_users_users1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobilita_has_users');
    }
}
