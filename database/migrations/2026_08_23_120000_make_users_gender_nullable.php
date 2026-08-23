<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Make users.gender nullable
|--------------------------------------------------------------------------
| Google-authenticated users are created without a gender value
| (see SocialiteController::handleGoogleCallback). The previous NOT NULL
| constraint caused an SQL error on first-time Google sign-in.
|
| Driver-aware by necessity:
|  - PostgreSQL: Blueprint->change() emits invalid SQL for enum-style
|    columns, so a plain ALTER COLUMN statement is used instead.
|  - SQLite (used by the test suite): does not support ALTER COLUMN,
|    so Laravel's table-recreation ->change() path is used there.
*/
return new class extends Migration
{
    public function up(): void
    {
        if (DB::connection()->getDriverName() === 'sqlite') {
            Schema::table('users', function (Blueprint $table) {
                $table->enum('gender', ['male', 'female'])->nullable()->change();
            });

            return;
        }

        DB::statement('ALTER TABLE users ALTER COLUMN gender DROP NOT NULL');
    }

    public function down(): void
    {
        if (DB::connection()->getDriverName() === 'sqlite') {
            Schema::table('users', function (Blueprint $table) {
                $table->enum('gender', ['male', 'female'])->nullable(false)->change();
            });

            return;
        }

        // Remove rows that would violate the restored constraint first.
        DB::statement('DELETE FROM users WHERE gender IS NULL');
        DB::statement('ALTER TABLE users ALTER COLUMN gender SET NOT NULL');
    }
};
