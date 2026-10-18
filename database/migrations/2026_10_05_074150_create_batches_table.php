<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('batches', function (Blueprint $table) {

            $table->id();

            // Course
            $table->foreignId('course_id')
                ->constrained('courses')
                ->cascadeOnDelete();

            // Batch
            $table->string('name');
            $table->string('code')->unique();

            // Dates
            $table->date('start_date');
            $table->date('end_date')->nullable();

            // Class Time
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();

            // Class Days
            $table->string('days')->nullable();

            // Room
            $table->string('room')->nullable();

            // Mode
            $table->enum('mode', [
                'online',
                'offline',
                'hybrid'
            ])->default('offline');

            // Online Class
            $table->string('meeting_link')->nullable();

            // Maximum Students
            $table->unsignedInteger('capacity')->default(30);

            // Description
            $table->text('description')->nullable();

            // Status
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index([
                'course_id',
                'start_date'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};
