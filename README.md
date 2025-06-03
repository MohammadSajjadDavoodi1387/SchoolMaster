
# School Management System

Hello!  
This project is a comprehensive school management system developed using the Laravel framework. Its main goal is to simplify the processes of managing students, teachers, courses, grades, and class scheduling. This system helps administrators and teachers easily and quickly register, edit, and manage information.

---

## Features

- **Teacher Management:** Add, edit, and delete teacher records.  
- **Student Management:** Add, edit, and delete student information.  
- **Course Management:** Ability to add, edit, and delete courses.  
- **Grade Management:** Enter continuous assessment and final exam grades for each student and course.  
- **Class Scheduling:** Assign teachers to specific classes and courses.  
- **User-Friendly Interface:** Easy-to-use forms to simplify data entry and management.

---

## Requirements

To run this project, you need the following:

- **PHP 8.1 or higher**  
- **Laravel 9.x or higher** (required packages are listed in `composer.json`)  
- **Composer** (to install Laravel packages)  
- **WAMP or XAMPP** (to set up a local Apache and MySQL server)  
- **Microsoft Visual C++ Redistributable** (latest version, required for some PHP extensions)  
- **MySQL or MariaDB** (to manage the project database)  

---

## Installation and Setup

1. Clone or download the project repository.  
2. Navigate to the project folder.  
3. Run the following command in your terminal to install Laravel packages:  
   ```bash
   composer install
   ```  
4. Copy the `.env.example` file and rename it to `.env`, then update the database and email settings according to your environment.  
5. Generate the application key:  
   ```bash
   php artisan key:generate
   ```  
6. Run the database migrations:  
   ```bash
   php artisan migrate
   ```  
7. Finally, run the project locally with:  
   ```bash
   php artisan serve
   ```  
8. Open your browser and go to `http://localhost:8000` to see the project in action.

---

## Email Support

For support or questions, feel free to contact me via email:  
**sajjaddavoodi1387@example.com**

---

## 📚 Code Documentation

For complete technical documentation, including code structure and function details, please visit the dedicated documentation file:  
➡️ [Code Documentation](./CODE_DOCUMENTATION.md)

