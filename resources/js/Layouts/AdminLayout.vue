<template>
    <div class="flex h-screen bg-gray-100" dir="rtl">
        <!-- الشريط الجانبي - على اليمين -->
        <div class="hidden md:flex flex-col w-64 bg-gray-800">
            <div class="flex items-center justify-center h-16 bg-gray-900">
                <span class="text-white font-bold uppercase">لوحة التحكم</span>
            </div>
            <div class="flex flex-col flex-1 overflow-y-auto">
                <nav class="flex-1 px-2 py-4 bg-gray-800 space-y-2">
                    <Link 
                        :href="route('admin.dashboard')" 
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium transition duration-200"
                        :class="{ 'bg-gray-700 text-white': $page.url === '/admin' }"
                    >
                        🏠 الرئيسية
                    </Link>
                    <Link 
                        :href="route('admin.dashboard')" 
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium transition duration-200"
                    >
                        📝 إدارة المحتوى
                    </Link>
                </nav>
            </div>
        </div>

        <!-- المحتوى الرئيسي -->
        <div class="flex flex-col flex-1 overflow-y-auto">
            <header class="bg-white shadow">
                <div class="flex justify-between items-center px-6 py-4">
                    <div class="flex items-center space-x-4 space-x-reverse">
                        <!-- أصبح space-x-reverse -->
                        <span class="text-gray-700">مرحباً، {{ $page.props.auth.user.name }}</span>
                        <Link 
                            :href="route('logout')" 
                            method="post" 
                            class="text-gray-500 hover:text-red-600 transition duration-200"
                        >
                            🚪 تسجيل خروج
                        </Link>
                    </div>
                    <div>
                        <slot name="header" />
                    </div>
                </div>
            </header>

            <main class="flex-1 p-6">
                <slot />
            </main>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<style scoped>
/* إضافة أي styles إضافية للـ RTL هنا */
</style>