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
       Schema::create('test_attempts', function (Blueprint $table) {
    $table->id();

    $table->foreignId('test_id')
        ->constrained('online_tests')
        ->cascadeOnDelete();

    $table->foreignId('student_id')
        ->constrained('users')
        ->cascadeOnDelete();

    $table->dateTime('started_at');
    $table->dateTime('submitted_at')->nullable();

    $table->unsignedInteger('score')->default(0);

    $table->unsignedInteger('total_marks')->default(0);

    $table->enum('status', [
        'in_progress',
        'submitted',
        'expired'
    ])->default('in_progress');

    $table->boolean('is_passed')->default(false);

    $table->timestamps();

    $table->index(['test_id', 'student_id']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_attempts');
    }
};
