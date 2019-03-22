<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 40)->nullable();
            $table->string('last_name', 40)->nullable();
            $table->string('username', 30)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('major', 60)->nullable(true);            // art, accounting,...
            $table->string('degree_program', 25)->nullable(true);   // bachelor's degree, master's degree, PhD., Non Degree
            $table->string('admission', 60)->nullable(true);        // Degree seeking, non-degree-seeking, summer only
            $table->string('country', 60)->nullable(true);
            $table->string('last_loggin_at')->nullable(true);
            $table->string('last_loggin_ip')->nullable(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
