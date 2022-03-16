## Tech stack assumptions 8.0 if running locally without Docker

- `PHP version`
- `Database` - MySQL installed

## DB migrations and seeding

- Please run DB migrations and seed as it is required to run the application smoothly

## Assuming .env variables are set before starting

- API_KEY = p2lbgWkFrykA4QyUmpHihzmc5BNzIABq
- DB_CONNECTION=mysql
- DB_HOST=mysql
- DB_PORT=3306
- DB_DATABASE=scootinaboot
- DB_USERNAME=sail
- DB_PASSWORD=password


## My experience
- I am not much experienced with generating Queues hence ommited task to
spin the users and run the whole process of Task in point 2
- However, I could have used Bash scripts but I guess that's not what you wanted to see.
- I read the job description it mentions RabbitMQ so thought not to attempt since I haven't
done it before
- Things that could have done better - but realised late after starting
  - Plural Model name
  - All test edge cases of all the API's
  - Not done validation for field not available and others.

## I recommend to use Docker set up :)
