<template>
    <MainLayout>
        <!-- قسم الهيرو الديناميكي -->
        <section 
            v-for="section in translatedHeroSections" 
            :key="section.id"
            class="relative bg-gradient-to-r from-blue-600 to-purple-700 dark:from-gray-800 dark:to-gray-900 text-white py-20"
        >
            <!-- خلفية الصورة -->
            <div 
                v-if="section.image_url && section.image_url !== '/images/hero-bg.jpg'" 
                class="absolute inset-0 bg-cover bg-center opacity-20"
                :style="{ backgroundImage: `url(${section.image_url})` }"
            ></div>
            
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center" :dir="dir">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6">
                        {{ getTranslatedText(section.title) }}
                    </h1>
                    
                    <p 
                        v-if="section.subtitle" 
                        class="text-xl md:text-2xl mb-4 text-blue-200"
                    >
                        {{ getTranslatedText(section.subtitle) }}
                    </p>
                    
                    <p class="text-lg md:text-xl mb-8 max-w-3xl mx-auto leading-relaxed">
                        {{ getTranslatedText(section.description) }}
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <Link 
                            :href="section.cta_link" 
                            class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-200 transform hover:scale-105"
                        >
                            {{ getTranslatedText(section.cta_text) }}
                        </Link>
                        <Link 
                            :href="route('about')" 
                            class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-200 transform hover:scale-105"
                        >
                            {{ $t('buttons.learn_more') }}
                        </Link>
                    </div>
                </div>
            </div>
        </section>

        <!-- قسم الهيرو الافتراضي إذا لم توجد بيانات -->
        <section 
            v-if="heroSections.length === 0"
            class="relative bg-gradient-to-r from-blue-600 to-purple-700 dark:from-gray-800 dark:to-gray-900 text-white py-20"
        >
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center" :dir="dir">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6">
                        {{ $t('home.welcome') }}
                    </h1>
                    
                    <p class="text-lg md:text-xl mb-8 max-w-3xl mx-auto leading-relaxed">
                        {{ $t('home.description') }}
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <Link 
                            :href="route('about')" 
                            class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-200 transform hover:scale-105"
                        >
                            {{ $t('buttons.learn_more') }}
                        </Link>
                        <Link 
                            :href="route('contact')" 
                            class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-200 transform hover:scale-105"
                        >
                            {{ $t('buttons.contact_us') }}
                        </Link>
                    </div>
                </div>
            </div>
        </section>

        <!-- باقي المحتوى -->
        <!-- ... -->
    </MainLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import { computed, ref, watch } from 'vue';

// الحصول على البيانات من الـ props
const props = defineProps({
    heroSections: {
        type: Array,
        default: () => []
    },
    canLogin: Boolean,
    canRegister: Boolean
});

const currentLocale = computed(() => {
    return localStorage.getItem('locale') || 'ar';
});

const dir = computed(() => currentLocale.value === 'ar' ? 'rtl' : 'ltr');

// دالة للحصول على النص المترجم من كائن JSON
const getTranslatedText = (textObject) => {
    if (!textObject) return '';
    
    if (typeof textObject === 'string') {
        return textObject;
    }
    
    if (typeof textObject === 'object') {
        return textObject[currentLocale.value] || textObject.en || textObject.ar || '';
    }
    
    return '';
};

// أقسام الهيرو المترجمة
const translatedHeroSections = computed(() => {
    return props.heroSections.map(section => ({
        ...section,
        translatedTitle: getTranslatedText(section.title),
        translatedSubtitle: getTranslatedText(section.subtitle),
        translatedDescription: getTranslatedText(section.description),
        translatedCtaText: getTranslatedText(section.cta_text)
    }));
});

// مراقبة تغيير اللغة وإعادة تحميل البيانات
watch(currentLocale, (newLocale) => {
    console.log('🔄 تغيير اللغة إلى:', newLocale);
    console.log('📊 بيانات الهيرو بعد تغيير اللغة:', translatedHeroSections.value);
});

// طباعة البيانات للتحقق
console.log('🔍 بيانات الهيرو المستلمة:', props.heroSections);
console.log('🌐 اللغة الحالية:', currentLocale.value);
console.log('🔄 أقسام الهيرو المترجمة:', translatedHeroSections.value);
</script>