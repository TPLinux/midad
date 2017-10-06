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
            /*
             * Tables must be exists: univer_classes, countries, cities, langs, univers, teams
             */
            $table->increments('u_id');
            $table->string('u_fname');
            $table->string('u_lname');
            $table->date('u_age')->nullable();
            $table->string('u_study_year')->nullable();

            // forigns
            $table->integer('u_country')->unsigned()->index();  // foreign
            $table->foreign('u_country')->references('country_id')->on('countries');
            
            $table->integer('u_lang')->unsigned()->index();  // foreign
            $table->foreign('u_lang')->references('lang_id')->on('langs');
            
            $table->integer('u_univer_class')->unsigned()->index()->nullable();  // foreign
            $table->foreign('u_univer_class')->references('uc_id')->on('univer_classes');
            
            $table->integer('u_study_country')->unsigned()->index()->nullable();  // foreign
            $table->foreign('u_study_country')->references('country_id')->on('countries');
            
            $table->integer('u_study_city')->unsigned()->index()->nullable();  // foreign
            $table->foreign('u_study_city')->references('city_id')->on('cities');
            
            $table->integer('u_study_lang')->unsigned()->index()->nullable();  // foreign
            $table->foreign('u_study_lang')->references('lang_id')->on('langs');
            
            $table->integer('u_univ_name')->unsigned()->index();  // foreign
            $table->foreign('u_univ_name')->references('univer_id')->on('univers');

            $table->integer('u_team')->unsigned()->index()->nullable();  // foreign
            $table->foreign('u_team')->references('team_id')->on('teams');
            
            $table->integer('u_points')->default(0);

            $table->enum('u_gender',['0','1']);
            $table->string('u_email')->unique();
            $table->string('u_password', 40);
            $table->string('u_pic')->nullable();
            $table->string('u_cover')->nullable();
            $table->string('u_confirm_code')->nullable(); // just for testing
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
