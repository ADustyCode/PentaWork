<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // penerima
            $table->string('title');
            $table->text('message');
            $table->string('type')->nullable(); // info, success, warning
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('notifications', function (Blueprint $table) {
            // Hapus kolom kalau rollback
            $table->dropColumn(['type', 'is_read']);
        });
    }
};
