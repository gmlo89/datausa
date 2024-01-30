# Technical Test Urbium



## Installation

Copy `.env.example` to `.env`

You can use Docker, just run `docker-compose up -d --build` 

Run migrations

```ssh
php artisan migrate
```

To get the retroactive data run:

```ssh
php artisan app:get-population-data
```


See http://localhost:8000/