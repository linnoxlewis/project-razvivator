<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScopeLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('scope_level')) {
            Schema::create('scope_level', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->integer('scopeId')->unsigned();
                $table->integer('userCharacterId')->unsigned();
                $table->integer('level')->default(0);
                $table->integer('score')->default(0);
                $table->foreign('scopeId')
                    ->references('id')
                    ->on('scope')
                    ->onDelete('cascade');
                $table->foreign('userCharacterId')
                    ->references('id')->on('user_character')
                    ->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scope_level');
    }
}
