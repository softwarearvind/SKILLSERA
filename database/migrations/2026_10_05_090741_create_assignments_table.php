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
       Schema::create('assignments', function (Blueprint $table) {

    $table->id();

    $table->foreignId('course_id')
        ->constrained('courses')
        ->cascadeOnDelete();

    $table->foreignId('module_id')
        ->constrained('course_modules')
        ->cascadeOnDelete();

    $table->string('title');

    $table->text('description')->nullable();

    $table->string('file')->nullable();

    $table->date('due_date')->nullable();

    $table->unsignedInteger('total_marks')->default(100);

    $table->boolean('is_active')->default(true);

    $table->timestamps();

    $table->index([
        'course_id',
        'module_id'
    ]);

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
