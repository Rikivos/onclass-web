# Laravel Mentoring Web

This project runs with Laravel version 11.

## Getting started

Assuming you've already installed on your machine: PHP (>= 7.0.0), [Laravel](https://laravel.com), [Composer](https://getcomposer.org) and [Node.js](https://nodejs.org).

``` bash
# install dependencies
composer install
npm install

# create .env file and generate the application key
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed --class=DatabaseSeeder

# build CSS and JS assets
npm run dev
```

Then launch the server:

``` bash
php artisan serve
```

The Laravel mentoring project is now up and running! Access it at http://localhost:8000.

## Licence

RWMCode 
