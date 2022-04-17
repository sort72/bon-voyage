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
            $table->double('economy_class_price')->default(0);
            $table->double('first_class_price')->default(0);
            $table->foreignId('destination_id')->constrained();
            $table->foreignId('origin_id')->constrained('destinations');
            $table->boolean('is_international')->default(false);
            $table->timestamp('departure_time');
            $table->timestamp('arrival_time')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
