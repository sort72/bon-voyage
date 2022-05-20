<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flight_id')->constrained()->cascadeOnDelete();
            $table->foreignId('cart_id')->constrained()->cascadeOnDelete();
            $table->string('type')->nullable();
            $table->string('reservation_code')->nullable();
            $table->string('status')->nullable();
            $table->double('price')->nullable();
            $table->string('seat', 8)->nullable();
            $table->string('passenger_document')->nullable();
            $table->string('passenger_email')->nullable();
            $table->string('passenger_name')->nullable();
            $table->string('passenger_surname')->nullable();
            $table->string('passenger_birth_date')->nullable();
            $table->string('passenger_gender')->nullable();
            $table->string('passenger_phone')->nullable();
            $table->string('emergency_name')->nullable();
            $table->string('emergency_contact')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
