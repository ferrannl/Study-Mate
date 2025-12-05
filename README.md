# Study-Mate

Study-Mate is a Laravel web application that lets you manage everything around a school or course program: **courses**, **teachers**, **exams** and **grades** (CRUD), all in one place.  
It was built as a final assignment (*Eindopdracht*) to practice full-stack Laravel development.

---

## Table of Contents

- [Features](#features)
- [Tech Stack](#tech-stack)
- [Project Structure](#project-structure)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
  - [Running the Application](#running-the-application)
- [Development Notes](#development-notes)
- [Contributing](#contributing)
- [License](#license)
- [Credits](#credits)

---

## Features

- **Course Management**
  - Create, read, update and delete courses
  - Store metadata such as name, description, period, etc.

- **Teacher Management**
  - CRUD interface for teachers
  - Link teachers to one or more courses

- **Exam & Grade Management**
  - Define exams per course
  - Register and update grades
  - Overview of results per exam / course

- **Laravel Goodies**
  - Routing, controllers and views using the Laravel MVC pattern
  - Eloquent ORM for working with the database
  - Blade templates for reusable layouts and views

---

## Tech Stack

- **Backend Framework:** [Laravel](https://laravel.com/)
- **Language:** PHP
- **Templating:** Blade
- **Database:** Any Laravel-supported SQL database (MySQL/MariaDB, PostgreSQL, etc.)
- **Tooling:**
  - Composer for PHP dependencies
  - NPM for frontend/build tooling (via `webpack.mix.js`)

---

## Project Structure

The project follows the standard Laravel structure. Some key directories:

- `app/` – Application logic (models, controllers, etc.)
- `routes/` – Route definitions (e.g. `web.php`)
- `resources/views/` – Blade templates for the UI
- `database/` – Migrations, seeds and factories
- `public/` – Public entry point (`index.php`) and public assets
- `config/` – Configuration files
- `tests/` – Automated tests

---

## Getting Started

### Prerequisites

Make sure you have the following installed:

- PHP (compatible with the Laravel version used in this project)
- Composer
- A database server (MySQL/MariaDB, PostgreSQL, etc.)
- Node.js and NPM (for building assets, if needed)

### Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/ferrannl/Study-Mate.git
   cd Study-Mate
