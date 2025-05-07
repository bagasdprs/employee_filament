# Filament Employees Management

A simple Laravel application for managing employees, states, cities, and countries using Filament Admin Panel.

## Features

-   Manage Countries, States, and Cities
-   Dynamic relationship dropdowns (e.g., select states based on country)
-   Responsive and modern admin UI using [Filament](https://filamentphp.com/)
-   Searchable and sortable data tables
-   Bulk delete and inline editing
-   Soft deletes (optional)

## Tech Stack

-   Laravel 10.x
-   Filament 3.3.x
-   Tailwind CSS (via Filament)
-   MySQL / MariaDB
-   PHP 8.1+

## Installation

1. Clone the repository:

```bash
git clone https://github.com/yourusername/filament-employees.git
cd filament-employees

composer install
npm install && npm run build

cp .env.example .env
php artisan key:generate

php artisan migrate

php artisan db:seed

php artisan serve

http://localhost:8000/admin
```
