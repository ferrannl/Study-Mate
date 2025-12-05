# Study-Mate

Study-Mate is a **Laravel 7** web application that lets you manage everything around a school or course program in one place: courses, teachers, exams and grades (CRUD).  
It was built as a **final assignment (Eindopdracht)** to practice full-stack Laravel development.

---

## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Project Structure](#project-structure)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
  - [Running the Application](#running-the-application)
- [Development Notes](#development-notes)
- [Roadmap / Ideas](#roadmap--ideas)
- [Contributing](#contributing)
- [License](#license)
- [Credits](#credits)

---

## Overview

Study-Mate is a simple school management tool where you can:

- Define **courses** and periods
- Assign **teachers** to courses
- Create **exams** per course
- Store and update **grades**
- Get an overview of results per exam / course

The focus of this project is on clean Laravel structure (routes, controllers, views, Eloquent models) and a working CRUD interface rather than a flashy frontend.

---

## Features

### Course Management

- Create, read, update and delete courses
- Store metadata such as:
  - Course name
  - Description
  - Period / term
  - (Other course-related fields configured in the database)

### Teacher Management

- CRUD interface for teachers
- Link one teacher to multiple courses
- Overview of which teacher teaches which course

### Exam & Grade Management

- Define exams per course
- Register and update grades
- View overviews of results per exam / per course

### Built on Laravel

- **Routing** and **controllers** using the Laravel MVC pattern
- **Eloquent ORM** for database access
- **Blade templates** for layout and views
- Uses typical Laravel tooling for dependency management and asset building

---

## Tech Stack

- **Framework:** Laravel 7
- **Language:** PHP (>= 7.2.5)
- **Templating:** Blade
- **Database:** Any Laravel-supported SQL database  
  (e.g. MySQL/MariaDB, PostgreSQL, SQLite)
- **Tooling:**
  - Composer – PHP dependencies
  - Node.js + NPM – frontend/build tooling (via `webpack.mix.js`)
  - PHPUnit / Laravel Dusk – automated and browser tests (available in `require-dev`)

---

## Project Structure

This project follows the standard Laravel structure. Some key directories:

- `app/` – Application logic  
  - Models, controllers, middleware, etc.
- `routes/` – Route definitions  
  - Especially `routes/web.php` for web routes
- `resources/views/` – Blade templates for the UI
- `database/` – Migrations, seeds and factories
- `public/` – Public entry point (`index.php`) and public assets
- `config/` – Configuration files
- `tests/` – Automated tests (PHPUnit / Dusk setup)

For more details, explore the folders in this repository.

---

## Getting Started

### Prerequisites

Make sure you have the following installed:

- **PHP** compatible with Laravel 7 (>= 7.2.5)
- **Composer**
- **Database server**  
  (MySQL/MariaDB, PostgreSQL, or SQLite)
- **Node.js & NPM** (for asset building, if needed)

### Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/ferrannl/Study-Mate.git
   cd Study-Mate

2. Install PHP dependencies

composer install


3. Copy the environment file

cp .env.example .env


4. Generate the application key

php artisan key:generate


5. Configure your database

Open .env and update at least:

DB_CONNECTION=mysql      # or pgsql/sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=study_mate
DB_USERNAME=your_user
DB_PASSWORD=your_password


6. Run migrations (and seeds if you have them configured)

php artisan migrate
# Optional: if seeders are configured
php artisan db:seed


7. Install frontend dependencies (optional, for assets)

npm install
npm run dev   # or npm run prod



Running the Application

Start the built-in Laravel development server:

php artisan serve

By default the app will be available at:

http://127.0.0.1:8000

Open that URL in your browser and start managing courses, teachers, exams and grades.


---

Development Notes

This project is meant as an Eindopdracht / final assignment to demonstrate:

Laravel directory structure

Use of controllers + routes + Blade views

Eloquent models and relationships

Basic CRUD operations


Feel free to adapt the codebase for your own experiments:

Add authentication

Extend the domain (students, enrollments, groups, etc.)

Improve the UI with your own styling or a CSS framework




---

Roadmap / Ideas

Some ideas if you want to continue working on this project:

Add authentication & authorization (admin vs. teacher roles)

Add students and link them to courses and grades

Export grades to CSV / Excel

Add search & filters on overviews

Add tests with PHPUnit and/or Laravel Dusk for major flows



---

Contributing

This is primarily a learning project, but feel free to:

1. Fork the repo


2. Create a feature branch


3. Open a pull request with a clear description



Suggestions, issues or improvement ideas are always welcome.


---

License

This project uses the MIT License (same as the default Laravel skeleton).
You are free to use, modify and distribute it according to the license terms.


---

Credits

Built with ❤️ using Laravel 7

Created as a school final assignment (Eindopdracht)

Initial Laravel skeleton: laravel/laravel
