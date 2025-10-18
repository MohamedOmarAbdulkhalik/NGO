<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Inertia\Inertia;

class HomeController extends Controller {
    public function index() {
        // جلب أقسام الهيرو النشطة مع جميع اللغات
        $heroSections = HeroSection::active()
            ->ordered()
            ->get()
            ->map(function ($section) {
                return [
                    'id' => $section->id,
                    'image_url' => $section->image_url,
                    // إرسال جميع اللغات
                    'title' => $section->title, // {'en': '...', 'ar': '...'}
                    'subtitle' => $section->subtitle,
                    'description' => $section->description,
                    'cta_text' => $section->cta_text,
                    'cta_link' => $section->cta_link,
                    'order' => $section->order
                ];
            });

        return Inertia::render('Frontend/Home', [
            'canLogin' => \Illuminate\Support\Facades\Route::has('login'),
            'canRegister' => \Illuminate\Support\Facades\Route::has('register'),
            'heroSections' => $heroSections
        ]);
    }
}