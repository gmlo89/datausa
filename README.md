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

## Endpoints

### api/state/population-records/{state:slug}

Response example:

```json
{
    "data": [
        {
            "year": 2015,
            "population": 38421464
        },
        {
            "year": 2016,
            "population": 38654206
        },
        {
            "year": 2017,
            "population": 38982847
        },
        {
            "year": 2018,
            "population": 39148760
        },
    ]
}
```


### api/state/population-records/{state:slug}/avg

Response example:

```json
{
    "data": {
        "avg": 39041736
    }
}
```