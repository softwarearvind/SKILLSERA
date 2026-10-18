<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('course_id')
                ->constrained('courses')
                ->cascadeOnDelete();

            $table->string('certificate_number')->unique();

            $table->string('title')
                ->default('Certificate of Completion');

            $table->date('issue_date');

            $table->date('completion_date')->nullable();

            $table->decimal('percentage', 5, 2)->nullable();

            $table->string('grade')->nullable();

            $table->text('description')->nullable();

            $table->string('certificate_file')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index([
                'student_id',
                'course_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
