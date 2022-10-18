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
        Schema::create('medicine_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('prescription')->nullable();
            $table->string('cost')->nullable();
            $table->date('due_date')->nullable();
            $table->enum('order_status', ['Success','Pending','Failed'])->nullable();
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
        Schema::dropIfExists('medicine_orders');
    }
};
