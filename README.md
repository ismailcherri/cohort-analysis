# Cohort-Analysis
A demo App which calculates weekly cohort retention based on a supplied CSV based on Laravel/VueJs

## Requirements
* PHP v7.2+
* PHP SQLite3 extension enabled (For running the tests)
* [Composer](https://getcomposer.org/doc/00-intro.md) version 1.8.5
* Running MySQL server v5.7.x instance
* Node v10.x (For editing JS & CSS source files)

## Installation
1. Clone this repository
2. Go to the repository folder
3. Copy the `.env.example` to `.env`
4. Create an empty MySQL database then update the database connection settings in the `.env` file accordingly, e.g.:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mysql_database_name
DB_USERNAME=mysql_database_user_name
DB_PASSWORD=mysql_database_user_password
```
5. Change the following keys in the `.env` file to production settings (optional)
```
APP_ENV=production
APP_DEBUG=false
```
6. From the root folder of the cloned repository run:
```
$ composer install
$ php artisan migrate --seed
$ php artisan key:generate
$ php artisan passport:keys
$ php artisan serve
```
7. Open `http://127.0.0.1:8000` in your browser
8. Login by visiting `http://127.0.0.1:8000/login` using the following default creds
```
user: demo@example.com
pass: demo
```
9. Visit `http://127.0.0.1:8000/retention-stats`
>
> **Note:** `http://127.0.0.1` can be replaced by `http://localhost` depending on your hosts file setup
>

## Running the tests
From the root of the project run:
```$ vendor/bin/phpunit```

## Compiling JS/CSS assets to development version
From the root of the project run:
```
$ npm install
$ npm run dev
```
