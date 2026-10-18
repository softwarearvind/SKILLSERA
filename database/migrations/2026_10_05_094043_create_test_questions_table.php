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
       Schema::create('test_questions', function (Blueprint $table) {

    $table->id();

    $table->foreignId('test_id')
        ->constrained('online_tests')
        ->cascadeOnDelete();

    $table->text('question');

    $table->enum('question_type', [
        'mcq',
        'true_false'
    ])->default('mcq');

    $table->unsignedInteger('marks')
        ->default(1);

    $table->unsignedInteger('sort_order')
        ->default(1);

    $table->boolean('is_active')
        ->default(true);

    $table->timestamps();

    $table->index([
        'test_id',
        'sort_order'
    ]);

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_questions');
    }
};
