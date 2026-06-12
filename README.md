# Spa Cover Management System

Internal management system for a spa cover manufacturing company, built with **Laravel 12**, **Filament v4**, **Livewire 3**, and **MySQL**.

## Features

- **Authentication** — Filament admin login at `/admin`
- **Customer Management** — CRUD with search, filters, soft deletes
- **Spa Model Management** — CRUD with validation, search, and filters
- **Order Management** — Customer/spa model relationships, status badges, SVG preview, PDF quotes
- **Dashboard Widgets** — Stats for customers and orders by status
- **Cover Preview** — Live SVG preview page with real-time updates
- **PDF Quotes** — Downloadable quotes via DomPDF

## Requirements

- PHP 8.2+ (8.3 recommended)
- Composer
- MySQL 8+
- PHP extensions: `intl`, `zip`, `pdo_mysql`

## Setup

1. **Install dependencies**

```bash
composer install
```

2. **Configure environment**

Copy `.env.example` to `.env` and set your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=spa_cover_management
DB_USERNAME=root
DB_PASSWORD=
```

3. **Create the database**

```sql
CREATE DATABASE spa_cover_management;
```

4. **Run migrations and seed**

```bash
php artisan migrate:fresh --seed
```

5. **Start the server**

```bash
php artisan serve
```

6. **Log in**

- URL: `http://localhost:8000/admin`
- Email: `admin@spa-cover.test`
- Password: `password`

## Architecture

| Layer | Location |
|-------|----------|
| Models & relationships | `app/Models/` |
| Order status enum | `app/Enums/OrderStatus.php` |
| Business logic | `app/Services/` |
| Form validation | `app/Http/Requests/` |
| Authorization | `app/Policies/` |
| Filament UI | `app/Filament/` |

## Services

### SvgGeneratorService

Generates SVG spa cover previews using dynamic width, height, corner radius, and fill color.

### QuotePdfService

Generates PDF quotes containing customer info, spa model details, order data, and SVG preview.

## Testing

```bash
php artisan test
```
