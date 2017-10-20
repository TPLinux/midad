<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->increments('miss_id');
            $table->string('miss_name');
            $table->string('miss_location');
            $table->string('miss_logo')->default('img');
            $table->text('miss_desc');
            $table->integer('miss_points');
            $table->enum('miss_range', ['0','1']);
            $table->date('miss_start_date')->nullable();
            $table->date('miss_end_date')->nullable();
            // forigns
            $table->integer('miss_comp')->unsigned()->index();  // foreign
            $table->foreign('miss_comp')->references('comp_id')->on('companies');
            
            $table->integer('miss_country')->unsigned()->index();  // foreign
            $table->foreign('miss_country')->references('country_id')->on('countries');

            $table->integer('miss_city')->unsigned()->nullable()->index();  // foreign
            $table->foreign('miss_city')->references('city_id')->on('cities');
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
        Schema::dropIfExists('missions');
    }
}
