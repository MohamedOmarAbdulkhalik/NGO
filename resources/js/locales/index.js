// تحميل جميع ملفات الترجمة تلقائياً
const modules = import.meta.glob('./**/*.json', { eager: true });

console.log('🚀 بدء تحميل ملفات الترجمة...');
console.log('📁 عدد الملفات المكتشفة:', Object.keys(modules).length);

const translations = {
    en: {},
    ar: {}
};

let processedFiles = 0;

for (const path in modules) {
    console.log(`\n--- معالجة الملف ${++processedFiles} ---`);
    console.log(`📄 المسار: ${path}`);
    
    const module = modules[path];
    console.log('📦 محتوى الموديول:', module);
    
    // استخراج اللغة والتصنيف من المسار
    const matches = path.match(/\.\/(en|ar)\/(.+)\.json$/);
    
    if (matches) {
        const locale = matches[1]; // en أو ar
        const category = matches[2]; // app, nav, home, etc.
        
        console.log(`✅ تم التعرف: اللغة = ${locale}, التصنيف = ${category}`);
        
        if (translations[locale]) {
            translations[locale][category] = module.default || module;
            console.log(`✅ تم دمج ${category}.${locale} بنجاح`);
        }
    } else {
        console.log('❌ لمطابقة نمط المسار المتوقع: ./{locale}/{category}.json');
        console.log('المسار الفعلي:', path);
    }
}

console.log('\n🎯 النتيجة النهائية:');
console.log('الترجمات الإنجليزية:', translations.en);
console.log('الترجمات العربية:', translations.ar);
console.log('✅ اكتمل تحميل جميع الترجمات');

export default translations;