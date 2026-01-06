<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('saved_jobs', function (Blueprint $table) {
            $table->id();

            // jobseeker (user dengan role jobseeker)
            $table->foreignId('jobseeker_id')
                ->constrained('users')
                ->onDelete('cascade');

            // job yang disimpan
            $table->foreignId('job_id')
                ->constrained('jobs')
                ->onDelete('cascade');

            $table->timestamps();

            // mencegah job yang sama disimpan dua kali oleh user yang sama
            $table->unique(['jobseeker_id', 'job_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('saved_jobs');
    }
};
