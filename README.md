## Installation:

Install composer dependencies
```sh
composer install
```

Create and configure the `.env` file based on `.env.example`

Run migrations: `:fresh` is optional
```sh
php artisan migrate:fresh
```

Seed the DB with temporarily dev data:
```sh
php artisan db:seed
```

Run the built-in server or configure external web server
```sh
php artisan serve
```