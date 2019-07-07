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

> **Note:** `http://127.0.0.1` can be replaced by `http://localhost` depending on your hosts file setup


## Running the tests
From the root of the project run:
```$ vendor/bin/phpunit```

## Compiling JS/CSS assets to development version
From the root of the project run:
```
$ npm install
$ npm run dev
```

## Testing the API through an external HTTP client
1. From the root folder of the project run & follow the instruction:
```
$ php artisan passport:client --password
```
2. Take note of the client ID and secrte
3, While the app is running i.e. `$ php artisan serve`, send a post request to `http://127.0.0.1/oauth/token` with the following form data:
```
grant_type=password
client_id=THE_ID
client_secret=THE_SECRET
username=demo@example.com
password=demo
```
4. You should get a JSON response with a `access_token` that should be used as `Bearer Athentication` to the subsequent requests

| Method   | URI                                     | Action                                                                    |
|----------|-----------------------------------------|---------------------------------------------------------------------------|
| GET|HEAD | api/retention-stats                     | App\Http\Controllers\RetentionStatController@index                        |
| GET|HEAD | api/retention-stats/weekly-cohorts      | App\Http\Controllers\RetentionStatController@weeklyCohorts                |
| GET|HEAD | api/retention-stats/{retention_stat}    | App\Http\Controllers\RetentionStatController@show                         |
| GET|HEAD | api/user                                | Closure                                                                   |
| GET|HEAD | oauth/authorize                         | Laravel\Passport\Http\Controllers\AuthorizationController@authorize       |
| DELETE   | oauth/authorize                         | Laravel\Passport\Http\Controllers\DenyAuthorizationController@deny        |
| POST     | oauth/authorize                         | Laravel\Passport\Http\Controllers\ApproveAuthorizationController@approve  |
| GET|HEAD | oauth/clients                           | Laravel\Passport\Http\Controllers\ClientController@forUser                |
| POST     | oauth/clients                           | Laravel\Passport\Http\Controllers\ClientController@store                  |
| PUT      | oauth/clients/{client_id}               | Laravel\Passport\Http\Controllers\ClientController@update                 |
| DELETE   | oauth/clients/{client_id}               | Laravel\Passport\Http\Controllers\ClientController@destroy                |
| GET|HEAD | oauth/personal-access-tokens            | Laravel\Passport\Http\Controllers\PersonalAccessTokenController@forUser   |
| POST     | oauth/personal-access-tokens            | Laravel\Passport\Http\Controllers\PersonalAccessTokenController@store     |
| DELETE   | oauth/personal-access-tokens/{token_id} | Laravel\Passport\Http\Controllers\PersonalAccessTokenController@destroy   |
| GET|HEAD | oauth/scopes                            | Laravel\Passport\Http\Controllers\ScopeController@all                     |
| POST     | oauth/token                             | Laravel\Passport\Http\Controllers\AccessTokenController@issueToken        |
| POST     | oauth/token/refresh                     | Laravel\Passport\Http\Controllers\TransientTokenController@refresh        |
| GET|HEAD | oauth/tokens                            | Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController@forUser |
| DELETE   | oauth/tokens/{token_id}                 | Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController@destroy |


### License
GPL
