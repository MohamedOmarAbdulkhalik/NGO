NGO Website - Local Development Setup
A step-by-step guide to set up and run the NGO website locally for development.

🛠️ Prerequisites
Before you begin, ensure you have the following installed on your system:

Required Software
PHP >= 8.1

Composer (PHP package manager)

Node.js >= 16.x

npm (Node package manager)

Git

MySQL >= 5.7

Verify Installation
bash
# Check PHP version
php --version

# Check Composer
composer --version

# Check Node.js
node --version

# Check npm
npm --version

# Check Git
git --version

# Check MySQL
mysql --version
🚀 Quick Setup (10-15 minutes)
Step 1: Clone the Repository
bash
# Clone the project
git clone https://github.com/your-org/ngo-website.git

# Navigate to project directory
cd ngo-website

# Switch to development branch
git checkout develop
Step 2: Install PHP Dependencies
bash
# Install Laravel and PHP packages
composer install
Step 3: Install JavaScript Dependencies
bash
# Install Node.js packages
npm install --legacy-peer-deps
Step 4: Environment Configuration
bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
Step 5: MySQL Database Setup
أولاً: إنشاء قاعدة البيانات في MySQL
bash
# الدخول إلى MySQL
mysql -u root -p

# إنشاء قاعدة البيانات
CREATE DATABASE ngo_website;

# الخروج من MySQL
EXIT;
ثانياً: تعديل ملف .env لإعدادات MySQL
bash
# افتح ملف .env وعدل الإعدادات التالية:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ngo_website
DB_USERNAME=root
DB_PASSWORD=your_mysql_password
Step 6: Database Migration & Seeding
bash
# تشغيل migrations لإنشاء الجداول في MySQL
php artisan migrate

# إضافة البيانات الأولية
php artisan db:seed

# أو تشغيل الاثنان معاً
php artisan migrate --seed
Step 7: Build Frontend Assets
bash
# بناء assets للإنتاج
npm run build

# أو للتطوير (مع التحديث المباشر)
npm run dev
Step 8: Start Development Server
bash
# تشغيل خادم Laravel للتطوير
php artisan serve

# التطبيق سيكون متاح على:
# http://localhost:8000
✅ Verification
After setup, verify everything is working:

افتح المتصفح على http://localhost:8000

يجب أن ترى الصفحة الرئيسية للموقع

اختيار تبديل اللغة بين الإنجليزية والعربية

اختيار وضع الظلام

تسجيل الدخول بحساب المدير (انظر أدناه)

🔑 Default Admin Account
Email: admin@example.com

Password: password

Role: Administrator
