<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            // pelamar
            $table->foreignId('jobseeker_id')
                ->constrained('users')
                ->onDelete('cascade');

            // lowongan
            $table->foreignId('job_id')
                ->constrained('jobs')
                ->onDelete('cascade');

            $table->string('status')->default('pending'); 
            // pending | interview | accepted | rejected

            $table->timestamps();

            // mencegah apply 2x ke job yang sama
            $table->unique(['jobseeker_id', 'job_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
