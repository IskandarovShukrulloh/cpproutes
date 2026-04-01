# 📚 CPP Routes (Learning Platform)

A learning platform inspired by Stepik, where users can create modules and lessons.
This project was built for educational purposes to practice Laravel concepts such as routing, MVC architecture, migrations, and seeders.

🚀 Features
- 📦 Create modules (courses)
- 📖 Add lessons inside modules
- 🎥 Attach videos and files to lessons
- 👤 Users can create their own content
- 👁 Guests can view lessons
- 🛠 Admin panel for management

## 🛠 Tech Stack
- Backend: PHP 8.3+ / Laravel 13
- Database: MySQL 8.4
- Templating: Blade
- Environment: OpenServer Panel 6.5

⚙️ Requirements
Make sure you have installed:
- PHP >= 8.3
- Composer
- MySQL >= 8.0
- OpenServer (or any local server)

## 📥 Installation
```bash
git clone https://github.com/IskandarovShukrulloh/cpproutes.git
cd cpproutes
composer install
```

🔧 Configuration
1. Copy the environment file:
2. cp .env.example .env

Set up your database connection:
**DB_DATABASE=your_db
DB_USERNAME=root
DB_PASSWORD=**

Generate application key:
**php artisan key:generate**
🗄 Database Setup
```bash
php artisan migrate
php artisan db:seed
```

▶️ Run the project
```bash
php artisan serve
```
click: **http://localhost:8000**

📁 Project Structure
app/Models
app/Http/Controllers

database/migrations
database/seeders

resources/views (Blade templates)

routes/web.php
storage/module_{}/lesson_{}/(files/videos) - files orvideos provided by lesson author 

🎯 Purpose of the Project
This project was created to practice:
🔹 Laravel routing
🔹 MVC architecture
🔹 Database migrations and seeders
🔹 CRUD operations
🔹 Backend development fundamentals

⚠️ Limitations
❌ No full frontend (Blade only)
❌ Minimal UI
❌ Not production-ready
