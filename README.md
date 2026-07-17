# 🏥 Clinic Appointment Management System

A **beginner-friendly Laravel CRUD project** designed to help students
learn Laravel fundamentals, including CRUD operations, Eloquent ORM,
form validation, and database relationships.

> **Note:** This project does **not** include authentication
> (Login/Register). It is intended for learning Laravel basics.

------------------------------------------------------------------------

## 📌 Features

-   Doctor Management (CRUD)
-   Patient Management (CRUD)
-   Specialization Management (CRUD)
-   Patient Profile Management
-   Appointment Management (CRUD)
-   Dashboard with summary statistics
-   Form Validation
-   Responsive Bootstrap UI

------------------------------------------------------------------------

## 🛠️ Technologies Used

-   Laravel
-   PHP
-   MySQL
-   Blade
-   Bootstrap 5
-   HTML5
-   CSS3
-   JavaScript

------------------------------------------------------------------------

## 🗄️ Database Relationships

### One-to-One

-   Patient → Patient Profile

### One-to-Many

-   Specialization → Doctors
-   Doctor → Appointments
-   Patient → Appointments

### Many-to-Many

-   Doctors ↔ Services (doctor_service pivot table)

------------------------------------------------------------------------

## 📂 Modules

-   Dashboard
-   Specializations
-   Doctors
-   Patients
-   Patient Profiles
-   Services
-   Appointments

------------------------------------------------------------------------

## 🚀 Installation

``` bash
git clone https://github.com/your-username/clinic-appointment-management-system.git
cd clinic-appointment-management-system
composer install
cp .env.example .env
php artisan key:generate
# Configure database in .env
php artisan migrate
php artisan serve
```

------------------------------------------------------------------------

## 📚 Learning Objectives

-   Laravel CRUD
-   Resource Controllers
-   Eloquent ORM
-   Migrations
-   Form Validation
-   One-to-One Relationship
-   One-to-Many Relationship
-   Many-to-Many Relationship

------------------------------------------------------------------------

## 👨‍💻 Author

Developed as a Laravel learning project.
Developed By KPJ31

## 📄 License

MIT License
