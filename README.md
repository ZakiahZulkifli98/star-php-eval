# Candidate Technical Evaluation - Star Media Group

## Time Limit: 60 - 90 Minutes

### Prerequisites
- PHP 8.5+ installed
- Composer 2.x installed

### Quick Setup Instructions
1. Clone this repository to your local machine.
2. Run `composer install`
3. Copy the environment file: `cp .env.example .env`
4. Generate app key: `php artisan key:generate`
5. Create SQLite file if needed (see database/ folder) and run migrations: `php artisan migrate`
6. Start dev server: `php artisan serve`

### Tasks
1. **Migrations & Models:** Create `Article` and `Category` models with a standard one-to-many relationship (Category has many Articles).
  * Article Model Requirements:
    * Required fields: title (string), summary (string), body (text), published_at (timestamp, nullable), permalink (string) category_id (foreign key).
    * Optional: Add 1 or 2 extra properties you feel are essential for a news portal article (e.g., status, thumbnail URL, author).
  * Category Model Requirements:
    * Required fields: category_id (int), category_name (string)
2. **Controller & API Endpoint:** Create a controller method returning articles formatted as JSON. Prevent N+1 database queries using eager loading (`with`).
3. **Frontend Integration:** Render the articles on a Bootstrap/Blade view with a simple JavaScript search filter.

### Submission Guidelines
- Commit code cleanly with clear commit messages.
- Push your completed work back to your repository and share the repository link with us.