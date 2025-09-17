# 📋 Tasklee - Task Management Made Easy

Tasklee is a task management application built with **Laravel**, **Blade**, and **Alpine.js** to practice and showcase modern web development workflows.

It comes with a **full CRUD** for tasks, along with features like:

- ✅ Checklists to break tasks into smaller steps  
- 🎨 Dynamic icons that adapt based on task type  
- 🗂️ Migrations, seeders, and factories for easy database setup  
- 🛠️ Clean and structured code, following best practices  

The goal of Tasklee is not only to manage tasks efficiently, but also to serve as a learning project that demonstrates how to structure features, handle routes, validate data, and keep code organized in a modern Laravel application.

## Prerequisites

- PHP 8.3 or higher
- Composer
- SQLite (default database)
- Node.js and npm (for frontend assets)

## Setup

1. Clone the repository:
   ```
   git clone https://github.com/DarlanSchmeller/tasklee-laravel
   cd task-management
   ```

2. Install PHP dependencies:
   ```
   composer install
   ```

3. Copy the `.env.example` file to `.env`:
   ```
   cp .env.example .env
   ```
   The default configuration uses SQLite, so no additional database setup is required.

4. Generate application key:
   ```
   php artisan key:generate
   ```

5. Run database migrations and seed the database:
   ```
   php artisan migrate --seed
   ```

6. Install and compile frontend assets:
   ```
   npm install
   npm run dev
   ```

7. Start the development server:
   ```
   php artisan serve
   ```

The application should now be running at `http://localhost:8000`.

## Features

- Create, read, update, and delete tasks
- Mark tasks as complete/incomplete
- Paginated task list
- Form validation
- Flash messages
- Checklists

This project is intended for study purposes to practice Laravel functionality and CRUD operations.
