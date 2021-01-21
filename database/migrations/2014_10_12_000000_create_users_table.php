<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    protected $tablename = 'users';

    public function up()
    {
        Schema::create($this->tablename, function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('role')->default('user');
            $table->string('info')->nullable();
            $table->integer('age')->nullable();
            $table->json('hobies')->nullable();
            $table->string('job')->nullable();
        });
    }

    public function down()
    {
        Schema::drop($this->tablename);
    }
}
