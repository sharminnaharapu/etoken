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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('MD Sofiul Bashar');
            $table->string('title')->default('Sofiul Ecommerce');
            $table->text('address')->nullable();
            $table->string('phone')->default('36981701');
            $table->string('email')->default('mdsofiul1997@gmail.com');
            $table->string('currency')->default('USD');
            $table->string('currency_symbol')->default('$');
            $table->string('country')->nullable();
            $table->string('mane_logo')->default('logo.png');
            $table->string('fab_logo')->default('fab-logo.png');
            $table->string('print_logo')->nullable();
            $table->string('stamp')->default('stamp.png');
            $table->string('leaveform_print_logo')->default('leaveformlogo.png');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linked_in')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('vk')->nullable();
            $table->string('website')->nullable();
            $table->unsignedBigInteger('create_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
