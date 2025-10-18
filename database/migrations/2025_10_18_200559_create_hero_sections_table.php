<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('image_url');
            $table->json('title'); // {'en': 'Welcome', 'ar': 'مرحباً'}
            $table->json('subtitle')->nullable(); // {'en': 'Subtitle', 'ar': 'نص فرعي'}
            $table->json('description'); // {'en': 'Description...', 'ar': 'الوصف...'}
            $table->json('cta_text'); // {'en': 'Get Started', 'ar': 'ابدأ الآن'}
            $table->string('cta_link');
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};