
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hero_slides', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->text('tags')->nullable();
            $table->string('logo')->nullable();

            $table->string('card1_icon')->nullable();
            $table->string('card1_title')->nullable();
            $table->string('card1_text')->nullable();

            $table->string('card2_icon')->nullable();
            $table->string('card2_title')->nullable();
            $table->string('card2_text')->nullable();

            $table->string('card3_icon')->nullable();
            $table->string('card3_title')->nullable();
            $table->string('card3_text')->nullable();

            $table->string('button1_text')->nullable();
            $table->string('button1_url')->nullable();
            $table->string('button2_text')->nullable();
            $table->string('button2_url')->nullable();

            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_slides');
    }
};
