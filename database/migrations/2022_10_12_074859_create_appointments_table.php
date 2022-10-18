<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('prescription')->nullable();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('slot_id');
            $table->unsignedBigInteger('doctor_id');
            $table->enum('appointment_status', ['Active','Cancel']);
            $table->enum('payment_status', ['Success','Pending','Failed']);
           

            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('slot_id')->references('id')->on('slots');
            $table->foreign('doctor_id')->references('id')->on('doctors');

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
        Schema::dropIfExists('appointments');
    }
};
