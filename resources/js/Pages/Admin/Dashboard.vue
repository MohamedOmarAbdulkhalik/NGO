<template>
    <div class="min-h-screen bg-gray-100">
        <!-- شريط التنقل الجانبي -->
        <AdminLayout>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    لوحة التحكم
                </h2>
            </template>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <!-- إحصائيات -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                            <h3 class="text-lg font-medium text-gray-900">إجمالي الزوار</h3>
                            <p class="text-3xl font-bold text-blue-600">{{ stats.total_visitors }}</p>
                        </div>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                            <h3 class="text-lg font-medium text-gray-900">المحتوى المنشور</h3>
                            <p class="text-3xl font-bold text-green-600">{{ stats.total_content }}</p>
                        </div>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                            <h3 class="text-lg font-medium text-gray-900">في انتظار الموافقة</h3>
                            <p class="text-3xl font-bold text-yellow-600">{{ stats.pending_approvals }}</p>
                        </div>
                    </div>

                    <!-- روابط سريعة -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">إدارة المحتوى</h3>
                        <div class="space-x-4">
                            <Link 
                                :href="route('admin.content')" 
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                            >
                                عرض المحتوى
                            </Link>
                            <Link 
                                :href="route('admin.content.create')" 
                                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"
                            >
                                إضافة محتوى جديد
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </AdminLayout>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import AdminLayout from '@/Layouts/AdminLayout.vue'

defineProps({
    stats: Object
})
</script>