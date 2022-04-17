<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorldCitiesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('world_cities', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Auto increase ID');
            $table->bigInteger('country_id')->unsigned()->comment('Country ID');
            $table->bigInteger('division_id')->unsigned()->nullable()->index('division_id')->comment('Division ID');
            $table->string('name', 255)->default('')->comment('City Name');
            $table->string('full_name', 255)->nullable()->comment('City Fullname');
            $table->string('code', 64)->nullable()->comment('City Code');
            $table->string('iana_timezone', 255)->nullable()->comment('IANA Timezone Name');
            $table->index(['country_id','division_id','name'], 'uniq_city');

            $table->foreign('country_id', 'world_cities_ibfk_1')->references('id')->on('world_countries')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('division_id', 'world_cities_ibfk_2')->references('id')->on('world_divisions')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('world_cities');
    }
}
