<div align="center">
    <img src="https://res.cloudinary.com/rexcuni/image/upload/v1688969225/favicon_oxddqi.png" width="80px">
    <br>
    <h1>PK-Karisma</h1>
</div>

## Description
Company profile website untuk PK-Karisma (perusahaan kayu) berbasis Laravel 11.
Menggunakan stack Laravel modern agar mudah dikembangkan dan dikelola lewat CMS.

## Features
- Laravel Breeze (Authentication scaffolding)
- Spatie (Role & Permission Management)
- Content Management System (CMS)

## Requirement
- PHP >= 8.2
- Composer
- Node.js & npm (for frontend assets)
- Database MySQL

## Packages
- [x] [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze)
- [x] [Spatie Laravel Permission](https://github.com/spatie/laravel-permission)

## Installation
1. Clone the repository
    ```bash
    git clone <repo-url> pk-karisma
    cd pk-karisma
    ```
2. Install dependencies
    ```bash
    composer install
    npm install && npm run dev
    ```
3. Set up environment
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
4. Configure `.env` file
    - Set your database name, user, and password
    - Optionally configure mail settings, app name, etc.
5. Run migrations and seeders
    ```bash
    php artisan migrate --seed
    ```
6. Start the development server
    ```bash
    php artisan serve
    ```
7. Read `Laravel.md`

## Screenshots
<img src="https://res.cloudinary.com/rexcuni/image/upload/v1751773137/Laravel_11_Multi-Purpose_Company_Profile_yumyz4.jpg" width="100%">

## Tech Stack
- Laravel Framework
- PHP
- JavaScript
- Docker
- Nginx
- MySQL

## Licensee
This project is open-source and free to use under the [MIT license](https://opensource.org/licenses/MIT).
