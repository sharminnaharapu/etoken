<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctor_tokens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('service_id')->nullable();
            $table->unsignedBigInteger('counter_id')->nullable();
            $table->unsignedBigInteger('room_id')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('token_number');
            $table->string('note')->nullable();
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('atend_by')->nullable();
            $table->dateTime('call_time')->nullable();
            $table->date('date');
            $table->unsignedBigInteger('create_by')->nullable();
            $table->unsignedBigInteger('update_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_tokens');
    }
};
