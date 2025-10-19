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
First: Create Database in MySQL

bash
# Login to MySQL
mysql -u root -p

# Create database
CREATE DATABASE ngo_website;

# Exit MySQL
EXIT;
Second: Configure .env for MySQL

Edit the .env file with these settings:

text
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ngo_website
DB_USERNAME=root
DB_PASSWORD=your_mysql_password
Step 6: Database Migration & Seeding
bash
# Run migrations to create tables in MySQL
php artisan migrate

# Seed with initial data
php artisan db:seed

# Or run both together
php artisan migrate --seed
Step 7: Build Frontend Assets
bash
# Build for production
npm run build

# OR for development (with hot reload)
npm run dev
Step 8: Start Development Server
bash
# Start Laravel development server
php artisan serve

# The application will be available at:
# http://localhost:8000
✅ Verification
After setup, verify everything is working:

Open your browser to http://localhost:8000

You should see the NGO website homepage

Test language switch between English and Arabic

Test dark mode toggle

Login with admin account (see below)

🔑 Default Admin Account
Email: admin@example.com

Password: password

Role: Administrator
