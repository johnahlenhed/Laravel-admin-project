# Laravel Admin Project

A web-based admin tool for managing beauty and personal care products. Built with Laravel 12 as part of a school assignment to learn application development using a framework.

## About

This application simulates a web shop admin dashboard where authenticated users can manage products and categories. The product catalog focuses on beauty and personal care items such as hair care, skin care, makeup, and fragrance.

## Features

- **Authentication** — Login/logout with session management
- **Product CRUD** — Create, read, update, and delete products
- **Category CRUD** — Manage product categories
- **Filtering** — Filter products by category and price range, with sort by price
- **Seeders & Factories** — Pre-loaded categories and products for consistent demo data

## Tech Stack

- **Backend:** Laravel 12, PHP 8.4+
- **Frontend:** Blade templates, Tailwind CSS 4
- **Build:** Vite
- **Database:** SQLite (default)

## Getting Started

### Prerequisites

- PHP 8.4+
- Composer
- Node.js & npm

### Installation

```bash
git clone https://github.com/johnahlenhed/Laravel-admin-project.git
cd Laravel-admin-project

composer install
npm install

cp .env.example .env
php artisan key:generate
php artisan storage:link

php artisan migrate --seed
composer run dev
```

The app will be available at `http://localhost:8000`.

### Default Login

| Field    | Value               |
|----------|---------------------|
| Email    | admin@laravel.com   |
| Password | password            |

## Database

- **Users** — Admin accounts
- **Categories** — Hair Care, Skin Care, Makeup, Fragrance, Man, Health & Wellness, Home & SPA
- **Products** — Linked to a category with name, description, price, and image URL

The seeders populate the database with realistic demo data so the app looks the same across environments.
