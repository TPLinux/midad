<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonerCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doner_companies', function (Blueprint $table) {
            $table->increments('doner_comp_id');
            $table->string('doner_comp_name');
            $table->string('doner_comp_phone');
            $table->string('doner_comp_email')->unique();
            $table->string('doner_comp_password');
            $table->string('doner_comp_place')->default('');
            $table->string('doner_comp_manager');
            $table->string('doner_comp_owner');
            $table->string('doner_comp_logo')->default('');
            $table->float('doner_comp_latitude')->default(0.0);
            $table->float('doner_comp_longtude')->default(0.0);
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
        Schema::dropIfExists('doner_companies');
    }
}
