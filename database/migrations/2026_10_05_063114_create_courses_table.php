<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('code')->unique();

            $table->text('description')->nullable();

            $table->string('duration')->nullable();

            $table->decimal('fees', 10, 2)->default(0);

            $table->enum('mode', [
                'online',
                'offline',
                'hybrid'
            ])->default('offline');

            $table->string('thumbnail')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
