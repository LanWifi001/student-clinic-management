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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            // Foreign key to users table (user)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->dateTime('appointment_date');
            $table->string('reason')->nullable();

            // Status of the appointment (e.g., pending, completed, cancelled)
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
