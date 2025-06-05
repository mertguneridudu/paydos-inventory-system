# 🚀 Paydos – Inventory Management System

Paydos is a centralized platform for efficiently tracking products, user assignments, and GSM packages. Manage assets, assign devices/SIM plans, and generate reports from a single dashboard.

---

## ✨ Key Features

* **📦 Inventory Management:**
    * Manage product categories with image uploads.
    * Assign devices (laptops, phones, etc.) with details like IMEI/Serial, Model, Status, and Notes.
    * Export assignment lists to Excel (.xlsx) or PDF.
* **📶 GSM Management:**
    * Organize SIM plans by departments (e.g., Sales, Support).
    * Define GSM packages (data, minutes, SMS) with an accordion view for details.
    * Assign SIM numbers and packages to users.
    * Export GSM assignments to Excel or PDF.
* **📊 Interface & Reporting:**
    * Dashboard with at-a-glance statistics and quick navigation.
    * Interactive tables with search, filter, sort, and pagination.
    * Visual cues (status badges, icons) and responsive design.

---

## 🛠️ Tech Stack

* **Backend:** PHP 8.x, Laravel Framework
* **Frontend:** HTML5, CSS3, JavaScript, jQuery, Bootstrap-based Admin Theme
* **Database:** MySQL / MariaDB

---

## ⚙️ Setup & Configuration

1.  **Clone the repository.**
2.  **Install dependencies:**
    ```bash
    composer install
    ```
3.  **Create your environment file:**
    ```bash
    cp .env.example .env
    ```
4.  **Generate Application Key:** This is crucial for securing your Laravel application.
    ```bash
    php artisan key:generate
    ```
    This command will automatically add the `APP_KEY` to your `.env` file.

5.  **Configure your `.env` file** with your database credentials and other settings:
    ```dotenv
    APP_NAME=Paydos
    APP_ENV=local
    APP_DEBUG=true
    APP_URL=http://localhost

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306      # Default MySQL/MariaDB port
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```
6.  **Run database migrations:**
    ```bash
    php artisan migrate
    ```
7.  **(Optional) Seed the database:**
    ```bash
    php artisan db:seed
    ```
8.  **Serve the application:**
    ```bash
    php artisan serve
    ```

---

© 2023 Paydos Software - Developed by Mert Güneri Dudu