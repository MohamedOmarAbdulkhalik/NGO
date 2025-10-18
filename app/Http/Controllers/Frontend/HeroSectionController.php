<?php

namespace App\Http\Controllers\Frontend;

use App\Models\HeroSection;
use Inertia\Inertia;
use App\Http\Controllers\Controller;


class HeroSectionController extends Controller
{
    /**
     * الحصول على أقسام الهيرو النشطة
     */
    public function getActiveSections()
    {
        $sections = HeroSection::active()
            ->ordered()
            ->get()
            ->map(function ($section) {
                return [
                    'id' => $section->id,
                    'image_url' => $section->image_url,
                    'title' => $section->translated_title,
                    'subtitle' => $section->translated_subtitle,
                    'description' => $section->translated_description,
                    'cta_text' => $section->translated_cta_text,
                    'cta_link' => $section->cta_link,
                    'order' => $section->order
                ];
            });

        return response()->json([
            'success' => true,
            'data' => $sections
        ]);
    }

    /**
     * عرض جميع أقسام الهيرو (للوحة التحكم)
     */
    public function index()
    {
        $sections = HeroSection::ordered()->get();

        return Inertia::render('Admin/HeroSections/Index', [
            'sections' => $sections
        ]);
    }
}