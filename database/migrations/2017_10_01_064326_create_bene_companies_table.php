<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bene_companies', function (Blueprint $table) {
            $table->increments('bene_comp_id');
            $table->string('bene_comp_name');
            $table->string('bene_comp_phone');
            $table->string('bene_comp_email')->unique();
            $table->string('bene_comp_password');
            $table->string('bene_comp_place')->default('');
            $table->string('bene_comp_manager');
            $table->string('bene_comp_owner');
            $table->string('bene_comp_logo')->default('');
            $table->string('bene_comp_latitude')->default(0.0);
            $table->string('bene_comp_longtude')->default(0.0);
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
        Schema::dropIfExists('bene_companies');
    }
}
