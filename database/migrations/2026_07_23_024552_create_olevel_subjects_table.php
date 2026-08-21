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
        Schema::create('olevel_subjects', function (Blueprint $table) {
            $table->id();
            // foreignId creates a BIGINT unsigned column to map perfectly with users.id
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name', 100);
            $table->tinyInteger('is_compulsory')->default(0);
            // Unique key to prevent duplicate subject names per user
            $table->unique(['user_id', 'name'], 'user_subject');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('olevel_subjects');
    }
};
