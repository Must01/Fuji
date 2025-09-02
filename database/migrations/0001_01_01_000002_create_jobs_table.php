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
        Schema::connection('mongodb')->create('jobs', function (Blueprint $table) {
            $table->index('queue');
            $table->index('payload');
            $table->index('attempts');
            $table->index('reserved_at');
            $table->index('available_at');
            $table->index('created_at');
        });

        Schema::create('job_batches', function (Blueprint $table) {
            $table->index('name');
            $table->index('total_jobs');
            $table->index('pending_jobs');
            $table->index('failed_jobs');
            $table->index('failed_job_ids');
            $table->index('options');
            $table->index('cancelled_at');
            $table->index('created_at');
            $table->timestamp('finished_at');
        });

        Schema::connection('mongodb')->create('failed_jobs', function (Blueprint $table) {
            $table->index('uuid');
            $table->index('connection');
            $table->index('queue');
            $table->index('payload');
            $table->index('exception');
            $table->timestamp('failed_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('jobs');
        Schema::connection('mongodb')->dropIfExists('job_batches');
        Schema::connection('mongodb')->dropIfExists('failed_jobs');
    }
};
