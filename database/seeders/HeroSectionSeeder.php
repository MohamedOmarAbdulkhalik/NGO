<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    public function run(): void
    {
        HeroSection::create([
            'image_url' => '/images/hero-bg.jpg',
            'title' => [
                'en' => 'Welcome to Our NGO',
                'ar' => 'مرحباً بكم في منظمتنا'
            ],
            'subtitle' => [
                'en' => 'Making a Difference in Our Community',
                'ar' => 'نصنع فرقاً في مجتمعنا'
            ],
            'description' => [
                'en' => 'We are dedicated to creating positive change through various community projects and sustainable development initiatives that empower individuals and transform communities.',
                'ar' => 'نحن ملتزمون بخلق تغيير إيجابي من خلال مشاريع مجتمعية متنوعة ومبادرات تنمية مستدامة تمكن الأفراد وتحول المجتمعات.'
            ],
            'cta_text' => [
                'en' => 'Get Started',
                'ar' => 'ابدأ الآن'
            ],
            'cta_link' => '/about',
            'is_active' => true,
            'order' => 1
        ]);

        // يمكنك إضافة المزيد من الأقسام هنا
        HeroSection::create([
            'image_url' => '/images/hero-2.jpg',
            'title' => [
                'en' => 'Join Our Mission',
                'ar' => 'انضم إلى مهمتنا'
            ],
            'subtitle' => [
                'en' => 'Together We Can Make a Change',
                'ar' => 'معاً يمكننا إحداث تغيير'
            ],
            'description' => [
                'en' => 'Become part of our growing community of volunteers and supporters working together to create lasting impact in the world.',
                'ar' => 'كن جزءاً من مجتمعنا المتزايد من المتطوعين والداعمين الذين يعملون معاً لخلق تأثير دائم في العالم.'
            ],
            'cta_text' => [
                'en' => 'Join Us',
                'ar' => 'انضم إلينا'
            ],
            'cta_link' => '/register',
            'is_active' => true,
            'order' => 2
        ]);

        $this->command->info('✅ تم إنشاء أقسام الهيرو بنجاح!');
    }
}