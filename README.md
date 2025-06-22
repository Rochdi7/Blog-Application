
# 📝 Laravel Blog Application

A powerful and flexible **Blog Application** built with **Laravel**, providing a complete blogging platform with:
- User Authentication
- Role and Permission Management
- Media Management
- Category and Post Management
- Clean and Responsive UI

---

## 🚀 **Features**
- 📝 CRUD Operations for Posts, Categories, and Media.
- 🔐 Role-based Access Control (Admin, Editor, User).
- 📂 Media Library for file management.
- 🌐 Pagination, Search, and Filters.
- 🗃️ Star Admin 2 Template for easy admin panel management.
- 💾 Database Migrations and Seeders for setup.

---

## 📂 **Project Structure**
```
├── app
│ ├── Console
│ ├── Exceptions
│ ├── Http
│ │ ├── Controllers
│ │ │ ├── Admin
│ │ │ │ ├── PostController.php
│ │ │ │ ├── CategoryController.php
│ │ │ │ ├── MediaController.php
│ │ │ │ ├── RoleController.php
│ │ │ │ └── PermissionController.php
│ │ │ └── Auth
│ │ └── Middleware
│ ├── Models
│ │ ├── User.php
│ │ ├── Post.php
│ │ ├── Category.php
│ │ └── Media.php
│ └── Providers
├── resources
│ ├── views
│ │ ├── admin
│ │ │ ├── roles
│ │ │ ├── permissions
│ │ │ ├── posts
│ │ │ ├── categories
│ │ │ └── media
│ └── layouts
│ └── admin.blade.php
└── routes
└── web.php
```

---

## 🛠️ **Installation**
1️⃣ **Clone the repository**:
```bash
git clone https://github.com/Rochdi7/Blog-Application.git
cd Blog-Application
```

2️⃣ **Install dependencies**:
```bash
composer install
npm install && npm run dev
```

3️⃣ **Create environment file**:
```bash
cp .env.example .env
```

4️⃣ **Generate application key**:
```bash
php artisan key:generate
```

5️⃣ **Set up your database in .env**:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_application
DB_USERNAME=root
DB_PASSWORD=
```

6️⃣ **Run migrations and seeders**:
```bash
php artisan migrate --seed
```

7️⃣ **Serve the application**:
```bash
php artisan serve
```
Visit: [http://127.0.0.1:8000](http://127.0.0.1:8000)
Dashboard: Visit: [http://127.0.0.1:8000/admin/dashboard](http://127.0.0.1:8000/admin/dashboard)
---

## ✨ **Contribution Guidelines**
- Fork the repository.
- Create your feature branch (`git checkout -b feature/new-feature`).
- Commit your changes (`git commit -m 'Add some feature'`).
- Push to the branch (`git push origin feature/new-feature`).
- Open a Pull Request.
