# 🚀 Paydos – Inventory Management System

*Paydos* is a sleek, centralized platform for tracking products, user assignments, and GSM packages. Designed for efficiency, it empowers your organization to manage assets, assign devices/SIM plans, and produce quick reports—all from a single dashboard.

---

## 🔑 Key Features

### 👥 User Management
- **Secure Login & Roles**  
  • Role-based permissions (Admin ↔ User)  
  • Protected sessions and hashed passwords  
- **User Profiles & Assignment Overview**  
  • View each user’s profile and their allocated assets  
  • “Custodian” PDF report generation per user  

---

### 📦 Inventory Management
- **Product Categories**  
  • Create, edit, and delete categories  
  • Upload images for each product  
- **Item Assignment**  
  • Assign devices (laptops, phones, etc.) to users  
  • Track IMEI/Serial Number, Model, Status, Notes  
- **Exports**  
  • Download assignment lists as Excel (.xlsx) or PDF

---

### 📶 GSM Management
- **GSM Categories / Departments**  
  • Organize SIM plans by department (e.g., Sales, Support)  
- **GSM Packages & Contents**  
  • Define data, minutes, SMS allowances  
  • Accordion-style view for package details  
- **GSM Assignment**  
  • Assign SIM numbers and packages to users  
  • Export GSM assignments to Excel or PDF

---

### 📊 Interface & Reporting
- **Dashboard**  
  • At-a-glance statistics (total assets, pending assignments)  
  • Quick navigation to Users, Inventory, GSM modules  
- **Interactive Tables**  
  • Search, filter, and sort any list (Users, Products, GSM, etc.)  
  • Pagination for large datasets  
- **Visual Cues**  
  • Status badges, icons, and consistent color schemes  
  • Responsive design for desktop and mobile  

---

## 🛠️ Technology Stack

| Layer      | Technology                                                                 |
|:----------:|:---------------------------------------------------------------------------|
| **Backend**  | PHP 8.x · Laravel Framework                                                 |
| **Frontend** | HTML5 · CSS3 · JavaScript · jQuery · Bootstrap-based admin theme             |
| **Database** | MySQL (or MariaDB)                                                         |

---

## ⚙️ Configuration

Set the following environment variables in your `.env` file (or your server’s configuration) to connect to the database:

```dotenv
DB_PORT=3306        # The port on which your MySQL/MariaDB server is listening (default: 3306)
DB_DATABASE=        # The name of the database that Paydos will use
DB_USERNAME=        # The database user with permissions to read/write to DB_DATABASE
DB_PASSWORD=        # The password for DB_USERNAME

---

> **Tip:** Keep your categories and packages well-organized to quickly locate assets and SIM plans. Paydos’s dashboard and interactive tables make it easy to filter and sort data in real time.

---

© 2023 Paydos Software  
