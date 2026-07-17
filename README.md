# Clinic Appointment Management System

A **beginner-friendly Laravel CRUD project** designed to help students
learn Laravel fundamentals, including CRUD operations, Eloquent ORM,
form validation, database relationships, and automated testing.

> **Note:** This project does **not** include authentication
> (Login/Register). It is intended for learning Laravel basics.

------------------------------------------------------------------------

## Features

-   Doctor Management (CRUD)
-   Patient Management (CRUD)
-   Specialization Management (CRUD)
-   Patient Profile Management
-   Appointment Management (CRUD)
-   Dashboard with summary statistics
-   Form Validation
-   Responsive Bootstrap UI
-   Automated Feature Tests

------------------------------------------------------------------------

## Technologies Used

-   Laravel
-   PHP
-   MySQL
-   Pest / PHPUnit
-   Blade
-   Bootstrap 5
-   HTML5
-   CSS3
-   JavaScript

------------------------------------------------------------------------

## Database Relationships

### One-to-One

-   Patient -> Patient Profile

### One-to-Many

-   Specialization -> Doctors
-   Doctor -> Appointments
-   Patient -> Appointments

### Many-to-Many

-   Doctors <-> Services (doctor_service pivot table)

------------------------------------------------------------------------

## Modules

-   Dashboard
-   Specializations
-   Doctors
-   Patients
-   Patient Profiles
-   Services
-   Appointments

------------------------------------------------------------------------

## Installation

```bash
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

## Testing Concept

This project includes automated feature tests using **Pest**, Laravel's
testing tools, and an in-memory SQLite database. The tests check the main
CRUD workflows without touching your local MySQL database.

### Test Files

-   `tests/Feature/PatientManagementTest.php`
    -   Checks patient pages, create, update, delete, validation, and patient
        profile data.
-   `tests/Feature/DoctorManagementTest.php`
    -   Checks doctor pages, doctor creation, validation, specialization, and
        service relationship data.
-   `tests/Feature/AppointmentManagementTest.php`
    -   Checks appointment pages, create, update, validation, doctor relation,
        and patient relation.
-   `tests/Feature/ServiceAndSpecializationTest.php`
    -   Checks service creation, specialization creation, and main resource
        pages.

### Run Tests

Run the full test suite:

```bash
php artisan test
```

Run only feature tests:

```bash
php artisan test tests/Feature
```

Run one test file:

```bash
php artisan test tests/Feature/AppointmentManagementTest.php
```

### Code Style Check

Laravel Pint is used for PHP code style.

Check style:

```bash
vendor\bin\pint --test
```

Automatically fix style issues:

```bash
vendor\bin\pint
```

### Frontend Build Check

On Windows PowerShell, use `npm.cmd` if `npm` is blocked by execution
policy.

```bash
npm.cmd run build
```

Current test status after adding the test files:

-   17 tests passed
-   74 assertions passed
-   Pint style check passed

------------------------------------------------------------------------

## Learning Objectives

-   Laravel CRUD
-   Resource Controllers
-   Eloquent ORM
-   Migrations
-   Form Validation
-   Feature Testing
-   Test Database Setup
-   One-to-One Relationship
-   One-to-Many Relationship
-   Many-to-Many Relationship

------------------------------------------------------------------------

## Author

Developed as a Laravel learning project.
Developed By KPJ31

## License

MIT License
