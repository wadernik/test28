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

## API:
Every request uses prefix `/api`

Authorization
```
POST /auth/login
```
Request (seeded user):
```json
{
    "username": "admin",
    "password": "password"
}
```

---

Manufacturers CRUD:

| Operation | Request             | Type   |
|-----------|---------------------|--------|
| Get       | /manufacturers/{id} | GET    |
| List      | /manufacturers      | GET    |
| Create    | /manufacturers      | POST   |
| Update    | /manufacturers/{id} | UPDATE |
| Delete    | /manufacturers/{id} | DELETE |

Create and update manufacturer body request example:
```json
{
    "name": "manufacturer #2"
}
```

---

Car Models CRUD:

| Operation | Request      | Type   |
|-----------|--------------|--------|
| Get       | /models/{id} | GET    |
| List      | /models      | GET    |
| Create    | /models      | POST   |
| Update    | /models/{id} | UPDATE |
| Delete    | /models/{id} | DELETE |

Create and update car model body request example:
```json
{
    "name": "model #3",
    "manufacturer_id": 2
}
```

---

Cars CRUD:

| Operation | Request    | Type   |
|-----------|------------|--------|
| Get       | /cars/{id} | GET    |
| List      | /cars      | GET    |
| Create    | /cars      | POST   |
| Update    | /cars/{id} | UPDATE |
| Delete    | /cars/{id} | DELETE |

Create and update car body request example:
```json
{
    "manufacturer_id": 2,
    "model_id": 3,
    "release_year": "2024",
    "mileage": 1,
    "color": "red"
}
```

---

User's favorites list:

There are 2 approaches how user's favorite cars could be listed:
through user's direct model relation (V1)
or through repository class via eloquent query builder (V2)

| Operation   | Request             | Type   |
|-------------|---------------------|--------|
| List V1     | /users/favorites/v1 | GET    |
| List V2     | /users/favorites/v2 | GET    |
| Manage list | /users/favorites    | POST   |
Manage list body request example:
```json
{
    "cars": [
        {
            "id": 1
        },
        {
            "id": 3
        }
    ]
}
```