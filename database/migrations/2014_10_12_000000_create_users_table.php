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
            $table->string('admission', 25)->nullable(true);           // Bachelors, Masters, Doctoral-PhD., Non Degree, summer only
            $table->string('degree', 60)->nullable(true);              // Field of Study: Digital Media, Journalism,...
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
