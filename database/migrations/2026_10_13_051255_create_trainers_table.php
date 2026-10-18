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
        Schema::create('trainers', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('designation');
        $table->string('experience')->nullable();
        $table->text('description')->nullable();
        $table->json('skills')->nullable();
        $table->string('photo')->nullable();
        $table->string('linkedin_url')->nullable();
        $table->string('email')->nullable();
        $table->boolean('is_active')->default(true);
        $table->unsignedInteger('sort_order')->default(0);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainers');
    }
};
