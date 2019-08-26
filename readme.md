# Guest App
This application is developed for logging guest visit

## Requirements
PHP >= 7.1.3

## Installation
git clone https://github.com/onally01/guest-app-front.git
cd guest-app-front/
composer install              # install project dependencies

# create database (you should change credentials)
Update .env with database name and password
php artisan migrate           # run database migrations

## Run Development Server

php -S localhost:8000 -t public

## Api Documentation




