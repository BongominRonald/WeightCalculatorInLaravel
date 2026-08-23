<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Make users.gender nullable
|--------------------------------------------------------------------------
| Google-authenticated users are created without a gender value
| (see SocialiteController::handleGoogleCallback). The previous NOT NULL
| constraint caused an SQL error on first-time Google sign-in. This
| migration relaxes the column so OAuth users can register, while the
| weight calculation treats a missing gender as "no bonus".
*/
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('gender', ['male', 'female'])->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Restore the original NOT NULL constraint.
            // NOTE: this fails if NULL genders exist in the table.
            $table->enum('gender', ['male', 'female'])->nullable(false)->change();
        });
    }
};
