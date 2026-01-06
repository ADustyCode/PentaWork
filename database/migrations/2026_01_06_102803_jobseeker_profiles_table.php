<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('jobseeker_profiles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('avatar')->nullable();

            $table->string('full_name')->nullable();
            $table->string('headline')->nullable();
            $table->string('location')->nullable();
            $table->string('job_status')->nullable();

            $table->text('summary')->nullable();

            $table->string('main_field')->nullable();
            $table->unsignedTinyInteger('experience_years')->nullable();

            $table->string('skills')->nullable();

            $table->string('job_preference_type')->nullable();
            $table->string('job_preference_location')->nullable();

            $table->string('portfolio_url')->nullable();
            $table->string('linkedin_url')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobseeker_profiles');
    }
};
