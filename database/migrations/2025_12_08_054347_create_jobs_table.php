<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained('users')->cascadeOnDelete();

            $table->string('title');
            $table->string('job_type');
            $table->string('level');
            $table->string('location');
            $table->unsignedBigInteger('salary')->nullable();
            $table->date('deadline');

            $table->text('summary');
            $table->text('responsibility');
            $table->text('qualification');
            $table->text('benefit')->nullable();

            $table->string('apply_email');
            $table->string('whatsapp')->nullable();

            $table->enum('status', ['draft', 'published'])->default('draft');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
