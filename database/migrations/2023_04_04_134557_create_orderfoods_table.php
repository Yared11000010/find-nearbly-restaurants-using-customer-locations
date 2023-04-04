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
        Schema::create('orderfoods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->enum('status', ['pending', 'in_progress', 'delivered']);
            $table->unsignedBigInteger('delivery_boy_id')->nullable();
            $table->foreign('delivery_boy_id')->references('id')->on('delivery_boys')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderfoods');
    }
};