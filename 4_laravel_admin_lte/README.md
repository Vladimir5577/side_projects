<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Description

This is a test assignment for a backend php developer position.

## Application setup

1. Copy .env and set settings.
```bash
cp .env.example .env
```

2. Install vendor
```bash
composer install
```

3. Generate application key
```bash
php artisan key:generate
```

## Using docker

1. Runs docker in daemon mode
```bash
docker-compose up -d
```

2. Stop docker containers
```bash
docker-compose stop
```

## Setting up local database

1. Run migrations
```shell
php artisan migrate
```

2. Running all seeds
```shell
php artisan db:seed
```

3. Rewrite database and run seeds
```shell
php artisan migrate:fresh --seed
```
