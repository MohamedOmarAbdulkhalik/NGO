<template>
    <div class="min-h-screen bg-white dark:bg-gray-900 transition-colors duration-300" :dir="dir">
        <!-- الهيدر -->
        <header class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <!-- الشعار -->
                    <div class="flex items-center">
                        <Link :href="route('home')" class="text-2xl font-bold text-gray-800 dark:text-white">
                            {{ $t('app.name') }}
                        </Link>
                    </div>

                    <!-- القائمة الرئيسية -->
                    <nav class="hidden md:flex space-x-8" :class="dir === 'rtl' ? 'space-x-reverse' : ''">
                        <Link 
                            :href="route('home')" 
                            class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition duration-200"
                            :class="{ 'text-blue-600 dark:text-blue-400': $page.url === '/' }"
                        >
                            {{ $t('nav.home') }}
                        </Link>
                        <Link 
                            :href="route('about')" 
                            class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition duration-200"
                        >
                            {{ $t('nav.about') }}
                        </Link>
                        <Link 
                            :href="route('projects')" 
                            class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition duration-200"
                        >
                            {{ $t('nav.projects') }}
                        </Link>
                        <Link 
                            :href="route('contact')" 
                            class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition duration-200"
                        >
                            {{ $t('nav.contact') }}
                        </Link>
                    </nav>

                    <!-- عناصر التحكم -->
                    <div class="flex items-center space-x-4" :class="dir === 'rtl' ? 'space-x-reverse' : ''">
                        <!-- تبديل اللغة -->
                        <button 
                            @click="switchLanguage(currentLocale === 'ar' ? 'en' : 'ar')"
                            class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition duration-200"
                            :title="currentLocale === 'ar' ? 'Switch to English' : 'التغيير إلى العربية'"
                        >
                            <span class="text-sm font-medium">
                                {{ currentLocale === 'ar' ? 'EN' : 'عربي' }}
                            </span>
                        </button>

                        <!-- تبديل الوضع الداكن -->
                        <button 
                            @click="toggleDarkMode"
                            class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition duration-200"
                        >
                            <span v-if="darkMode" class="text-yellow-500">🌙</span>
                            <span v-else class="text-gray-600">☀️</span>
                        </button>

                        <!-- روابط المستخدم -->
                        <template v-if="$page.props.auth.user">
                            <Link 
                                :href="route('dashboard')" 
                                class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition duration-200"
                            >
                                {{ $t('nav.dashboard') }}
                            </Link>
                            <Link 
                                :href="route('logout')" 
                                method="post" 
                                class="text-gray-600 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 transition duration-200"
                            >
                                🚪
                            </Link>
                        </template>
                        <template v-else>
                            <Link 
                                :href="route('login')" 
                                class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition duration-200"
                            >
                                {{ $t('nav.login') }}
                            </Link>
                            <Link 
                                :href="route('register')" 
                                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200"
                            >
                                {{ $t('nav.register') }}
                            </Link>
                        </template>
                    </div>
                </div>
            </div>
        </header>

        <!-- المحتوى الرئيسي -->
        <main>
            <slot />
        </main>

        <!-- الفوتر -->
        <footer class="bg-gray-800 dark:bg-gray-900 text-white mt-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-4 md:mb-0">
                        <p class="text-gray-400">&copy; 2024 {{ $t('app.name') }}. {{ $t('app.all_rights') }}</p>
                    </div>
                    <div class="flex space-x-6" :class="dir === 'rtl' ? 'space-x-reverse' : ''">
                        <Link :href="route('home')" class="text-gray-400 hover:text-white transition duration-200">
                            {{ $t('nav.home') }}
                        </Link>
                        <Link :href="route('about')" class="text-gray-400 hover:text-white transition duration-200">
                            {{ $t('nav.about') }}
                        </Link>
                        <Link :href="route('contact')" class="text-gray-400 hover:text-white transition duration-200">
                            {{ $t('nav.contact') }}
                        </Link>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { computed, ref, onMounted } from 'vue';

const darkMode = ref(false);

const currentLocale = computed(() => {
    return localStorage.getItem('locale') || 'ar';
});

const dir = computed(() => currentLocale.value === 'ar' ? 'rtl' : 'ltr');

const switchLanguage = (newLocale) => {
    localStorage.setItem('locale', newLocale);
    document.documentElement.dir = newLocale === 'ar' ? 'rtl' : 'ltr';
    document.documentElement.lang = newLocale;
    window.location.reload(); // إعادة تحميل لتطبيق التغييرات
};

const toggleDarkMode = () => {
    darkMode.value = !darkMode.value;
    localStorage.setItem('darkMode', darkMode.value);
    
    if (darkMode.value) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
};

onMounted(() => {
    // تحميل إعدادات الوضع الداكن
    const savedDarkMode = localStorage.getItem('darkMode') === 'true';
    darkMode.value = savedDarkMode;
    
    if (savedDarkMode) {
        document.documentElement.classList.add('dark');
    }

    // تطبيق إعدادات اللغة
    const savedLocale = localStorage.getItem('locale') || 'ar';
    document.documentElement.dir = savedLocale === 'ar' ? 'rtl' : 'ltr';
    document.documentElement.lang = savedLocale;
});
</script>