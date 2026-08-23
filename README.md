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

This app is configured for **Vercel** (free Hobby tier) with a **Neon Postgres** database. The `vercel.json` in the repo root wires everything up: PHP runtime, static asset serving, and the Vite build. Composer dependencies are installed automatically by the `vercel-php` runtime when it bundles the serverless function.

### Step 1 — Create the database (free)

1. Sign up at [neon.tech](https://neon.tech) and create a project.
2. Copy the connection string (looks like `postgres://user:pass@host/dbname?sslmode=require`).

### Step 2 — Import the repo into Vercel

1. Go to [vercel.com/new](https://vercel.com/new) and import this GitHub repository.
2. Vercel reads `vercel.json` automatically — no framework preset needed.

### Step 3 — Add environment variables in the Vercel dashboard

| Key | Value |
|---|---|
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |
| `APP_NAME` | `S6WeightCalculator` |
| `APP_KEY` | Generate locally: `php artisan key:generate --show` |
| `APP_URL` | `https://your-app.vercel.app` |
| `LOG_CHANNEL` | `stderr` |
| `VIEW_COMPILED_PATH` | `/tmp/views` |
| `SESSION_SECURE_COOKIE` | `true` |
| `DB_CONNECTION` | `pgsql` |
| `DB_URL` | your Neon connection string |
| `QUEUE_CONNECTION` | `sync` |
| `SESSION_DRIVER` | `database` |
| `CACHE_STORE` | `database` |
| `MAIL_MAILER` | `smtp` + your SMTP settings (`MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `MAIL_PASSWORD`, `MAIL_ENCRYPTION=tls`) |
| `GOOGLE_CLIENT_ID` | your Google OAuth client ID |
| `GOOGLE_CLIENT_SECRET` | your Google OAuth client secret |
| `GOOGLE_REDIRECT` | `https://your-app.vercel.app/auth/google/callback` |

### Step 4 — Update Google Cloud Console

Add `https://your-app.vercel.app/auth/google/callback` under **Credentials → Authorized redirect URIs**.

### How it works

- All non-static requests are rewritten to `api/index.php`, which boots Laravel via the [`vercel-php`](https://github.com/vercel-community/php) serverless runtime.
- Static assets (`/build/*`, `/images/*`, `/favicon.svg`, …) are served directly from `public/` by Vercel's CDN — filesystem wins over rewrites.
- On deploy, the `vercel-php` runtime runs `composer install` internally, and Vercel runs `npm ci && npm run build`.
- Database schema changes are applied **manually** from your machine (see the Neon troubleshooting section above) — the serverless build environment has no PHP on its PATH.
- Serverless has no background workers and a read-only filesystem, hence `QUEUE_CONNECTION=sync`, database-backed sessions/cache, stderr logs, and compiled views redirected to `/tmp`.

### Troubleshooting local connection to Neon (XAMPP)

XAMPP's PHP ships an old `libpq` without SNI support, which Neon requires:

1. In `C:\xampp\php\php.ini`, enable `extension=pgsql` **before** `extension=pdo_pgsql`.
2. Pass Neon's router the endpoint ID via env var when running artisan commands:
   ```powershell
   $env:DB_CONNECTION='pgsql'
   $env:DB_URL='<your-neon-url>'
   $env:DB_PORT='5432'   # .env's DB_PORT=3306 would otherwise override the URL
   $env:PGOPTIONS='endpoint=<first-part-of-your-host>'
   php artisan migrate --force
   ```
3. On Vercel none of this is needed — its runtime has modern `libpq`, so plain `DB_URL` works.

### Free-tier notes

- Cold starts of ~1–2s after inactivity are normal.
- Gmail SMTP works but is rate-limited; consider [Brevo](https://www.brevo.com) (300 emails/day free) if deliverability matters.

## License

MIT License - Feel free to use and modify for your needs.

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Run tests: `composer run test`
5. Run code style: `./vendor/bin/pint`
6. Submit a pull request