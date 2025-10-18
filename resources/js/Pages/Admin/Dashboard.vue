<template>
    <div class="min-h-screen bg-gray-100" dir="rtl">
        <!-- شريط التنقل الجانبي -->
        <AdminLayout>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    📊 لوحة التحكم
                </h2>
            </template>

            <div class="py-8">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <!-- إحصائيات -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-r-4 border-blue-500">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-lg font-medium text-gray-900">إجمالي الزوار</h3>
                                    <p class="text-3xl font-bold text-blue-600 mt-2">{{ stats.total_visitors }}</p>
                                </div>
                                <div class="text-blue-500 text-2xl">👥</div>
                            </div>
                        </div>
                        
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-r-4 border-green-500">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-lg font-medium text-gray-900">المحتوى المنشور</h3>
                                    <p class="text-3xl font-bold text-green-600 mt-2">{{ stats.total_content }}</p>
                                </div>
                                <div class="text-green-500 text-2xl">📄</div>
                            </div>
                        </div>
                        
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-r-4 border-yellow-500">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-lg font-medium text-gray-900">في انتظار الموافقة</h3>
                                    <p class="text-3xl font-bold text-yellow-600 mt-2">{{ stats.pending_approvals }}</p>
                                </div>
                                <div class="text-yellow-500 text-2xl">⏳</div>
                            </div>
                        </div>
                    </div>

                    <!-- روابط سريعة -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-6 border-b pb-3">الإجراءات السريعة</h3>
                        <div class="flex gap-4">
                            <Link 
                                :href="route('admin.dashboard')" 
                                class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-200 flex items-center gap-2"
                            >
                                <span>👁️</span>
                                <span>عرض المحتوى</span>
                            </Link>
                            <Link 
                                :href="route('admin.dashboard')" 
                                class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 transition duration-200 flex items-center gap-2"
                            >
                                <span>➕</span>
                                <span>إضافة محتوى جديد</span>
                            </Link>
                        </div>
                    </div>

                    <!-- قسم إضافي -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                            <h4 class="text-lg font-medium text-gray-900 mb-4">آخر النشاطات</h4>
                            <div class="space-y-3 text-gray-600">
                                <p>لا توجد نشاطات حديثة</p>
                            </div>
                        </div>
                        
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                            <h4 class="text-lg font-medium text-gray-900 mb-4">إحصائيات سريعة</h4>
                            <div class="space-y-2 text-gray-600">
                                <p>المستخدمون النشطون: 0</p>
                                <p>التعليقات الجديدة: 0</p>
                                <p>الطلبات الحديثة: 0</p>
                            </div>
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

<style scoped>
/* تأكد من أن النص يبدأ من اليمين */
[dir="rtl"] {
    text-align: right;
}

/* تحسين المسافات للغة العربية */
.space-x-reverse > * + * {
    margin-right: 1rem;
    margin-left: 0;
}
</style>