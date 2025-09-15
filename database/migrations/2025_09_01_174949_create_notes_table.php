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
        Schema::connection('mongodb')->create('notes', function (Blueprint $connection) {
            $connection->index('user_id');
            $connection->index('name');
            $connection->index('note');
            $connection->index('color');
            $connection->index('custom_color');
            $connection->index('tag');
            $connection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('notes');
    }
};
