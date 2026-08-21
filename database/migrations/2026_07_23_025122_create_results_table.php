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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->decimal('olevel_weight', 5, 2)->default(0.00);
            $table->decimal('alevel_weight', 6, 2)->default(0.00);
            $table->integer('total_points')->default(0);
            $table->decimal('gender_bonus', 4, 2)->default(0.00);
            $table->decimal('cutoff', 6, 2)->nullable()->default(null);
            $table->decimal('total_weight', 7, 2)->default(0.00);
            $table->string('eligibility', 50)->nullable()->default(null);
            // Enforcement of a 1:1 user-to-result profiling structure
            $table->unique(['user_id'], 'user_result');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
