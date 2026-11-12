# Star Media Group – Technical Assessment

## Overview

A Laravel-based article management application developed as part of the Star Media Group technical assessment.

The application allows users to browse articles, view article details, and search articles by title. It also provides a JSON API endpoint for retrieving articles with their associated categories.

## Requirements

- PHP 8.5+
- Composer 2.x
- SQLite

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/ZakiahZulkifli98/star-php-eval.git
    cd star-php-eval
    ```

2. Install PHP dependencies:

    ```bash
    composer install
    ```

3. Create the environment file:

    ```bash
    cp .env.example .env
    ```

4. Generate the application key:

    ```bash
    php artisan key:generate
    ```

5. Create the SQLite database file:

    ```bash
    touch database/database.sqlite
    ```

6. Configure `.env`:

    ```env
    DB_CONNECTION=sqlite
    ```

7. Run migrations and seed the database:

    ```bash
    php artisan migrate --seed
    ```

8. Start the development server:

    ```bash
    php artisan serve
    ```

9. Open the application:

    `http://127.0.0.1:8000`

## Features

- Article listing with category information.
- Real-time article title search using JavaScript.
- Article detail page displaying the full article content.
- SEO-friendly article URLs using permalinks.
- JSON API endpoint with eager-loaded category relationships.
- Database migrations, model relationships, factories and seeders.

## Routes

| Method | Endpoint                | Description               |
| ------ | ----------------------- | ------------------------- |
| GET    | `/articles`             | Display article listing   |
| GET    | `/articles/{permalink}` | Display article details   |
| GET    | `/api/articles`         | Retrieve articles as JSON |

## Database Structure

### Categories

- `id`
- `name`
- `created_at`
- `updated_at`

### Articles

- `id`
- `title`
- `summary`
- `body`
- `published_at`
- `permalink`
- `status`
- `author`
- `category_id`
- `created_at`
- `updated_at`

### Relationships

- A category has many articles.
- An article belongs to one category.

## Technology Stack

- Laravel
- PHP
- SQLite
- Blade
- Bootstrap 5
