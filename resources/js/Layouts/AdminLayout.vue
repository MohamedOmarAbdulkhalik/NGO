<template>
    <div class="flex h-screen bg-gray-100">
        <!-- الشريط الجانبي -->
        <div class="hidden md:flex flex-col w-64 bg-gray-800">
            <div class="flex items-center justify-center h-16 bg-gray-900">
                <span class="text-white font-bold uppercase">لوحة التحكم</span>
            </div>
            <div class="flex flex-col flex-1 overflow-y-auto">
                <nav class="flex-1 px-2 py-4 bg-gray-800 space-y-2">
                    <Link :href="route('admin.dashboard')" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                        الرئيسية
                    </Link>
                    <Link :href="route('admin.content')" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                        إدارة المحتوى
                    </Link>
                </nav>
            </div>
        </div>

        <!-- المحتوى الرئيسي -->
        <div class="flex flex-col flex-1 overflow-y-auto">
            <header class="bg-white shadow">
                <div class="flex justify-between items-center px-4 py-3">
                    <div>
                        <slot name="header" />
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700">{{ $page.props.auth.user.name }}</span>
                        <Link :href="route('logout')" method="post" class="text-gray-500 hover:text-gray-700">
                            تسجيل خروج
                        </Link>
                    </div>
                </div>
            </header>

            <main class="flex-1">
                <slot />
            </main>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>