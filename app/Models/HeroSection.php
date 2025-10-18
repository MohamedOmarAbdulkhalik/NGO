<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_url',
        'title',
        'subtitle', 
        'description',
        'cta_text',
        'cta_link',
        'is_active',
        'order'
    ];

    protected $casts = [
        'title' => 'array',
        'subtitle' => 'array',
        'description' => 'array',
        'cta_text' => 'array',
        'is_active' => 'boolean'
    ];

    /**
     * الحصول على العنوان بناءً على اللغة المطلوبة
     */
    public function getTitleForLocale($locale = null)
    {
        $locale = $locale ?: $this->getCurrentLocale();
        return $this->title[$locale] ?? $this->title['en'] ?? '';
    }

    /**
     * الحصول على العنوان الفرعي بناءً على اللغة المطلوبة
     */
    public function getSubtitleForLocale($locale = null)
    {
        $locale = $locale ?: $this->getCurrentLocale();
        return $this->subtitle[$locale] ?? $this->subtitle['en'] ?? '';
    }

    /**
     * الحصول على الوصف بناءً على اللغة المطلوبة
     */
    public function getDescriptionForLocale($locale = null)
    {
        $locale = $locale ?: $this->getCurrentLocale();
        return $this->description[$locale] ?? $this->description['en'] ?? '';
    }

    /**
     * الحصول على نص CTA بناءً على اللغة المطلوبة
     */
    public function getCtaTextForLocale($locale = null)
    {
        $locale = $locale ?: $this->getCurrentLocale();
        return $this->cta_text[$locale] ?? $this->cta_text['en'] ?? '';
    }

    /**
     * الحصول على اللغة الحالية من localStorage أو session
     */
    protected function getCurrentLocale()
    {
        // محاولة الحصول من request header (لـ API)
        if (request()->hasHeader('Accept-Language')) {
            return request()->header('Accept-Language');
        }

        // محاولة الحصول من session
        if (session()->has('locale')) {
            return session()->get('locale');
        }

        // الإعداد الافتراضي
        return 'en';
    }

    /**
     * Scope للحصول على الأقسام النشطة فقط
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope للترتيب
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('created_at');
    }
}