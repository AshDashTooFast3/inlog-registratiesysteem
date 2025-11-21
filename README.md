# inlog-registratiesysteem

A Laravel-based login and registration system for dental practice management.

## About

This is a login and registration system (inlog-registratiesysteem) built with Laravel, featuring role-based access for different user types in a dental practice:
- Tandarts (Dentist)
- Mondhygienist (Dental Hygienist)  
- Assistent (Assistant)
- Praktijkmanagement (Practice Management)
- Patient

## Requirements

- PHP 8.2 or higher
- Composer
- Node.js & NPM
- MySQL or compatible database

## Installation

1. Clone the repository
2. Copy `.env.example` to `.env` and configure your database
3. Install dependencies:
   ```bash
   composer install
   npm install
   ```
4. Generate application key:
   ```bash
   php artisan key:generate
   ```
5. Run migrations:
   ```bash
   php artisan migrate
   ```
6. Build assets:
   ```bash
   npm run build
   ```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
