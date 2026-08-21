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
        Schema::create('olevel_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('subject_name', 100);
            $table->string('grade', 10);
            $table->enum('bucket', ['distinction', 'credit', 'pass', 'fail']);
            $table->decimal('weight_value', 3, 1);
            // Unique key ensuring one specific grade tracking entry per subject per user
            $table->unique(['user_id', 'subject_name'], 'user_subject_grade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('olevel_scores');
    }
};
