<p align="center" style="font-size: xxx-large">Work in laravel</p>


# Getting started

## Tech stack

- `Framework` - [Laravel](https://laravel.com/)
- `Database` - MySQL
- `Docker container` - Using Laravel `sail`
- `Set up assumptions` - Please see `assumptions.md`

## Set up using Laravel artisan server 

Clone the repository

    git clone https://github.com/heenamanglani/work-in-laravel.git

Switch to the repo folder

    cd work-in-laravel

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server 

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/heenamanglani/work-in-laravel.git
    cd work-in-laravel
    composer install
    cp .env.example .env
    php artisan key:generate

**Make sure you set the correct database connection information before running the
migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Populate the database with seed data with relationships which includes users, scooters and trips. This can help you to quickly start testing the api and start using it with ready
content.**

Open the UserSeeder.php and set the property values as per your requirement

    database/seeds/UserSeeder.php

Run the database seeder and you're done - all or using specific seeder file name

    php artisan db:seed or php artisan db:seed --class=UserSeeder

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to
clean the database by running the following command

    php artisan migrate:refresh

## Docker

To install with [Docker](https://www.docker.com), run following commands:

> Assumption - Docker is installed in your machine, if not please install.

```
git clone https://github.com/heenamanglani/work-in-laravel.git
cd work-in-laravel
cp .env.example.docker .env
composer install
./vendor/bin/sail up - This will fire up docker container
```

> In order for sail command to work, add sail alias to your machine!

> alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail' 

> See the steps, how to add alias into your MacOS(assumption) depending on terminal - https://wpbeaches.com/make-an-alias-in-bash-or-zsh-shell-in-macos-with-terminal/ 

```
sail artisan key:generate
sail artisan jwt:generate
sail artisan migrate
sail artisan db:seed
sail up
```

The api can be accessed at [http://localhost:8084/api](http://localhost:8084/api).

## API Specification

Postman API bundle has been shared, without writing documentation in Postman just test calls.

> [Full API Spec](https://www.getpostman.com/collections/c9540d64db70c5d04631)


----------


## Dependencies

- Nothing at this point - we can add JWT token for better security

## Folders

- `app` - Contains all the Eloquent models
- `app/Http/Controllers` - Contains all the api controllers
- `app/Http/Middleware` - Contains the API auth middleware
- `config` - Contains all the application configuration files
- `database/factories` - Contains the model factory for all the models
- `database/migrations` - Contains all the database migrations
- `database/seeds` - Contains the database seeder
- `routes` - Contains all the api routes defined in api.php file
- `tests` - Contains all the application tests


## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application
fully working.

----------

# Testing API

Run the docker

    sail up

The api can now be accessed at

    http://localhost:8084/api

Request headers

| **Required**    | **Key**                | **Value**                |
|----------	|------------------	|------------------	|
| Yes        | Content-Type        | application/json    |
| Yes        | api_token    | p2lbgWkFrykA4QyUmpHihzmc5BNzIABq    |


Refer the [api specification](#api-specification) for more info.

----------

# Authentication

This applications uses hardcoded api key in .env file and sending as header in API's as `api_token` to handle authentication. 

----------

## Fire up PHPMYADMIN - Docker

- From Docker Dashboard, you can also run PHPMYADMIN or directly in browser at http://localhost:8085/ using credentials kept in ASSUMPTIONS.MD

## Perform Tests

Run command ``sail test`` to check the tests

- if need to see test coverage then run 
  - `` sail test  --coverage-html tests/coverage``
  - after running the above command index.html would have been created under 'tests/coverage/index.html' - run it it browser by right clicking on it you will see the coverage of tests covered.
