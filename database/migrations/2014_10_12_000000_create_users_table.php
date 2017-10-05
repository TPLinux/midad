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
            $table->increments('u_id');
            $table->string('u_fname');
            $table->string('u_lname');
            $table->integer('u_country');
            $table->string('u_lang');
            $table->string('u_univ_name');
            $table->integer('u_points')->default(0);
            $table->integer('u_team')->default(0);
            $table->enum('u_gender',['0','1']);
            $table->string('u_email')->unique();
            $table->string('u_password', 40);
            $table->string('u_confirm_code');
            $table->enum('u_confirmed', ['0','1'])->default('0');
            $table->rememberToken();
            $table->timestamps();
            $table->engine = 'InnoDB';
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
