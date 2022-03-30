<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('name', 24)->nullable();
            $table->foreignId('destination_id')->constrained()->cascadeOnDelete();
            $table->foreignId('origin_id')->constrained('destinations')->cascadeOnDelete();
            $table->boolean('is_international')->default(false);
            $table->timestamp('departure_time');
            $table->timestamp('arrival_time');
            $table->double('price_tourist');
            $table->double('price_business');
            $table->integer('discount')->default(0);
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
        Schema::dropIfExists('flights');
    }
}
