<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('test_attempt_answers', function (Blueprint $table) {
    $table->id();

    $table->foreignId('attempt_id')
        ->constrained('test_attempts')
        ->cascadeOnDelete();

    $table->foreignId('question_id')
        ->constrained('test_questions')
        ->cascadeOnDelete();

    $table->foreignId('option_id')
        ->nullable()
        ->constrained('test_options')
        ->nullOnDelete();

    $table->unsignedInteger('marks_obtained')->default(0);

    $table->boolean('is_correct')->default(false);

    $table->timestamps();

    $table->unique(['attempt_id', 'question_id']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_attempt_answers');
    }
};
