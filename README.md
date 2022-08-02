# Play Slim Dice

This is game of dice, under format API on Slim Framework 4.

## Deploy (local)

- `git clone`;
- `cd PlaySlimDice`
- `docker-compose up -d --build`;
- `docker exec -it play-slim-dice-api php /usr/bin/composer install`;

-- -
## Collection by [Postman](https://www.postman.com/)
- Version: `v2.1.0`
- File: `app/doc/postman/Play-Slim-Dice.postman_collection.json`

-- -
## Request to play

Request:

- `http://0.0.0.0/api/dice/play`

Method:
- `GET`

Parameters:
- Quantity `[1-5]`
- Face `[4,6,8,10,12,13,14,15,16,17,18,19,20]`

Description:

- `Face` is not required and default value is `6`.
- `Quantity` is not required and default value is `1`.

Response Json to quantity `3`, face `6`:
```
{
    "statusCode": 200,
    "data": {
        "dice": [
            6,
            5,
            5
        ]
    }
}
```
