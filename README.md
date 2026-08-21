# CHARM - University Admission Weight Calculator

A Laravel application for calculating university admission weights based on O-Level and A-Level results. Designed for students to compute their eligibility for university admission.

## Features

- **O-Level Subject Registration**: Register compulsory and optional subjects
- **O-Level Score Entry**: Enter UNEB grades with automatic weight calculation
- **A-Level Subject Registration**: Register principal and subsidiary subjects
- **A-Level Score Entry**: Enter grades with automatic point calculation
- **Weight Calculator**: Compute total admission weight with gender bonus
- **Eligibility Check**: Compare against university cutoff points
- **Results Dashboard**: View complete summary of all entries and calculations
- **User Authentication**: Secure registration, login, email verification, and password management

## Tech Stack

- **Backend**: Laravel 12.x (PHP 8.2+)
- **Frontend**: Blade Templates + Tailwind CSS + Alpine.js
- **Database**: SQLite (development) / MySQL/PostgreSQL (production)
- **Authentication**: Laravel Breeze + Socialite (Google OAuth)
- **Testing**: PHPUnit with 25 feature/unit tests
- **Code Style**: Laravel Pint

## Requirements

- PHP 8.2+
- Composer
- Node.js & NPM
- SQLite (for development) or MySQL/PostgreSQL

## Installation

```bash
# Clone the repository
git clone <repository-url>
cd charm-laravel

# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install

# Copy environment file and generate key
cp .env.example .env
php artisan key:generate

# Run migrations (creates SQLite database)
php artisan migrate

# Build frontend assets
npm run build

# Start development server
php artisan serve
```

## Development

```bash
# Run all services (server, queue, logs, Vite)
composer run dev

# Run tests
composer run test

# Check code style
./vendor/bin/pint --test

# Fix code style
./vendor/bin/pint
```

## Environment Variables

Key environment variables (see `.env.example` for all):

```env
APP_NAME=CHARM
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=sqlite
# For production:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=charm
# DB_USERNAME=root
# DB_PASSWORD=

MAIL_MAILER=log
# For production:
# MAIL_MAILER=smtp
# MAIL_HOST=smtp.mailgun.org
# MAIL_PORT=587
# MAIL_USERNAME=...
# MAIL_PASSWORD=...

GOOGLE_CLIENT_ID=your-google-client-id
GOOGLE_CLIENT_SECRET=your-google-client-secret
GOOGLE_REDIRECT_URI=http://localhost/auth/google/callback
```

## Project Structure

```
app/
├── Http/Controllers/
│   ├── Auth/              # Authentication controllers
│   ├── DashboardController.php    # Main calculation logic
│   ├── ProfileController.php      # User profile management
│   ├── ContactController.php      # Contact form
│   └── NewsletterController.php   # Newsletter subscription
├── Models/
│   ├── User.php
│   ├── OLevelSubject.php
│   ├── OLevelScore.php
│   ├── ALevelSubject.php
│   ├── ALevelScore.php
│   └── Result.php
├── Services/
│   └── GradeConfig.php    # Grade mappings and calculation rules
└── View/Components/       # Reusable Blade components

database/
├── migrations/            # Database schema
├── factories/             # Test factories
└── seeders/               # Database seeders

resources/views/
├── auth/                  # Authentication views
├── profile/               # Profile management views
├── layouts/               # Layout templates
└── *.blade.php            # Feature views (dashboard, subjects, scores, weight, view)

tests/
├── Feature/               # Feature tests (auth, profile)
└── Unit/                  # Unit tests
```

## Grade Configuration

The application uses Uganda UNEB grading systems:

**O-Level Grades & Weights:**
- D1, D2 (Distinction): 0.3 weight
- C3, C4, C5, C6 (Credit): 0.2 weight
- P7, P8 (Pass): 0.1 weight
- F9 (Fail): 0.0 weight

**A-Level Principal Subject Points:**
- A: 6, B: 5, C: 4, D: 3, E: 2, O: 1, F: 0

**A-Level Subsidiary Points:**
- D1-D6: 1 point, P7-F9: 0 points

**Weight Formula:**
- Essential 1: 3× points
- Essential 2: 3× points
- Desirable: 2× points
- Subsidiaries: 1× points each
- + O-Level total weight
- + Gender bonus (Female: 1.5)

## Deployment

1. Set `APP_ENV=production` and `APP_DEBUG=false`
2. Configure production database in `.env`
3. Set up proper mail driver
4. Configure Google OAuth credentials
5. Run `composer install --optimize-autoloader --no-dev`
6. Run `npm run build`
7. Run `php artisan config:cache && php artisan route:cache && php artisan view:cache`
8. Set up queue worker: `php artisan queue:work`
9. Configure web server (Nginx/Apache) to point to `public/`

## License

MIT License - Feel free to use and modify for your needs.

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Run tests: `composer run test`
5. Run code style: `./vendor/bin/pint`
6. Submit a pull request