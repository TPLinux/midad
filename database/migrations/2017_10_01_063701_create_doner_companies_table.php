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
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('comp_id');
            $table->string('comp_name');
            $table->string('comp_name_en');
            $table->enum('comp_type', ['org_comp','gov_comp','uni_comp', 'comp_comp']);
            $table->enum('comp_sort', ['doner_comp','bene_comp','both_comp']);
            $table->string('comp_lnumber');
            $table->string('comp_phone')->nullable();
            $table->string('comp_email')->unique();
            $table->string('comp_password');
            $table->string('comp_place')->nullable();
            $table->string('comp_manager')->nullable();
            $table->string('comp_owner')->nullable();
            $table->string('comp_logo')->nullable();
            $table->string('comp_confirm_code');
            $table->enum('comp_confirmed', ['0','1'])->default('0');
            $table->float('comp_latitude')->default(0.0);
            $table->float('comp_longtude')->default(0.0);
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
