<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_progress', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('course_id')
                ->constrained('courses')
                ->cascadeOnDelete();

            $table->foreignId('module_id')
                ->nullable()
                ->constrained('course_modules')
                ->nullOnDelete();

            $table->unsignedTinyInteger('progress_percentage')
                ->default(0);

            $table->enum('status', [
                'not_started',
                'in_progress',
                'completed'
            ])->default('not_started');

            $table->dateTime('started_at')->nullable();
            $table->dateTime('completed_at')->nullable();

            $table->timestamps();

            $table->index([
                'student_id',
                'course_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_progress');
    }
};
