<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use MongoDB\Laravel\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('mongodb')->create('users', function (Blueprint $connection) {
            $connection->id();
            $connection->index('name');
            $connection->unique('email');
            $connection->timestamp('email_verified_at');
            $connection->index('password');
            $connection->rememberToken();
            $connection->timestamps();
        });

        Schema::connection('mongodb')->create('password_reset_tokens', function (Blueprint $connection) {
            $connection->index('email');
            $connection->index('token');
            $connection->timestamp('created_at');
        });

        Schema::connection('mongodb')->create('sessions', function (Blueprint $connection) {
            $connection->index('user_id');
            $connection->index('ip_address');
            $connection->index('user_agent');
            $connection->index('payload');
            $connection->index('last_activity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('users');
        Schema::connection('mongodb')->dropIfExists('password_reset_tokens');
        Schema::connection('mongodb')->dropIfExists('sessions');
    }
};
