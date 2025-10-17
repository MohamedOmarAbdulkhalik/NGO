<template>
    <div class="min-h-screen bg-gray-50">
        <!-- الهيدر -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    مرحباً بك في موقعنا
                </h1>
            </div>
        </header>

        <!-- المحتوى الرئيسي -->
        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <div class="px-4 py-6 sm:px-0">
                    <div class="border-4 border-dashed border-gray-200 rounded-lg h-96 p-8 text-center">
                        <h2 class="text-2xl font-semibold mb-4">الصفحة الرئيسية</h2>
                        <p class="text-gray-600 mb-6">هذا موقع تعريفي تفاعلي</p>
                        
                        <div class="space-x-4">
                            <Link 
                                :href="route('login')" 
                                class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600"
                                v-if="canLogin"
                            >
                                تسجيل الدخول
                            </Link>
                            <Link 
                                :href="route('register')" 
                                class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600"
                                v-if="canRegister"
                            >
                                إنشاء حساب
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
})
</script>