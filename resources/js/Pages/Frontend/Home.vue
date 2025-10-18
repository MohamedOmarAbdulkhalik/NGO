<template>
    <MainLayout>
        <!-- قسم البطل -->
        <section class="bg-gradient-to-r from-blue-600 to-purple-700 dark:from-gray-800 dark:to-gray-900 text-white py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center" :dir="dir">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6">
                        {{ $t('home.welcome') }}
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto leading-relaxed">
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

        <!-- قسم المهمة -->
        <section class="py-16 bg-gray-50 dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12" :dir="dir">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        {{ $t('home.our_mission') }}
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                        {{ $t('home.mission_text') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- بطاقة 1 -->
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg p-6 transform hover:scale-105 transition duration-300">
                        <div class="text-blue-600 dark:text-blue-400 text-4xl mb-4">🌍</div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                            {{ $t('home.community') }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $t('home.community_text') }}
                        </p>
                    </div>

                    <!-- بطاقة 2 -->
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg p-6 transform hover:scale-105 transition duration-300">
                        <div class="text-green-600 dark:text-green-400 text-4xl mb-4">💡</div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                            {{ $t('home.innovation') }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $t('home.innovation_text') }}
                        </p>
                    </div>

                    <!-- بطاقة 3 -->
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg p-6 transform hover:scale-105 transition duration-300">
                        <div class="text-purple-600 dark:text-purple-400 text-4xl mb-4">🤝</div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                            {{ $t('home.collaboration') }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $t('home.collaboration_text') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- قسم الإحصائيات -->
        <section class="py-16 bg-white dark:bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div>
                        <div class="text-3xl font-bold text-blue-600 dark:text-blue-400 mb-2">500+</div>
                        <div class="text-gray-600 dark:text-gray-300">{{ $t('home.projects_completed') }}</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-green-600 dark:text-green-400 mb-2">50+</div>
                        <div class="text-gray-600 dark:text-gray-300">{{ $t('home.volunteers') }}</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-purple-600 dark:text-purple-400 mb-2">25+</div>
                        <div class="text-gray-600 dark:text-gray-300">{{ $t('home.communities') }}</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-orange-600 dark:text-orange-400 mb-2">10+</div>
                        <div class="text-gray-600 dark:text-gray-300">{{ $t('home.years_experience') }}</div>
                    </div>
                </div>
            </div>
        </section>
    </MainLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import { computed } from 'vue';

const currentLocale = computed(() => {
    return localStorage.getItem('locale') || 'ar';
});

const dir = computed(() => currentLocale.value === 'ar' ? 'rtl' : 'ltr');
</script>