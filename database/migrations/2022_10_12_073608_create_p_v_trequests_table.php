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
        Schema::create('p_v_trequests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('request_for')->nullable();
            $table->date('expected_date')->nullable();
            $table->longText('destination_location')->nullable();
            $table->enum('status',['Pending','Attaining','Completed','Cancelled'])->default('Pending');

            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');

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
        Schema::dropIfExists('p_v_trequests');
    }
};
