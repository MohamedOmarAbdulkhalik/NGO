import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import translations from './locales';

// دالة الترجمة المحسنة
const t = (key, params = {}) => {
    const locale = localStorage.getItem('locale') || 'ar';
    const keys = key.split('.');
    let value = translations[locale];
    
    for (const k of keys) {
        value = value?.[k];
    }
    
    // إذا كانت القيمة نصاً، نطبق المعاملات
    if (typeof value === 'string' && Object.keys(params).length > 0) {
        Object.keys(params).forEach(param => {
            value = value.replace(`:${param}`, params[param]);
        });
    }
    
    return value || key;
};

// دالة تبديل اللغة المحسنة
const switchLanguage = (locale) => {
    localStorage.setItem('locale', locale);
    document.documentElement.dir = locale === 'ar' ? 'rtl' : 'ltr';
    document.documentElement.lang = locale;
    
    // إرسال event لتحديث المكونات بدون إعادة تحميل
    window.dispatchEvent(new CustomEvent('languageChanged', { detail: locale }));
};

// نظام لإدارة اللغة
const i18n = {
    t,
    switchLanguage,
    currentLocale: () => localStorage.getItem('locale') || 'ar',
    onLanguageChange: (callback) => {
        window.addEventListener('languageChanged', (event) => {
            callback(event.detail);
        });
    }
};

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${t('app.name')}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const vueApp = createApp({ 
            render: () => h(App, props) 
        })
        .use(plugin)
        .use(ZiggyVue);

        // توفير دالة الترجمة globally
        vueApp.config.globalProperties.$t = t;
        vueApp.config.globalProperties.$i18n = i18n;
        vueApp.config.globalProperties.$currentLocale = i18n.currentLocale;

        // جعل i18n متاحاً في الـ composition API
        vueApp.provide('i18n', i18n);

        return vueApp.mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});

// جعل النظام متاحاً globally
window.$t = t;
window.$i18n = i18n;