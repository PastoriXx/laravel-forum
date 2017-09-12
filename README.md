# Development Laravel Forum

The project was written to repeat the skills of working with such things as:

- Laravel 5.5
- Docker (PHP 7.1 FPM, Nginx 1.13, Mysql 5.7, Redis 3.2)
- Redis for cache
- Ajax
- ...

## Run

You'll want to copy the `.env.example` file to `.env` like usual. Run `composer install` to install dependencies and that should be it for the app.

Once you [install Docker](https://docs.docker.com/), you can start the containers using Docker Compose
```sh
$ docker-compose up -d
```

You should be able to visit the app at [http://localhost:8080](http://localhost:8080)

## Description of settings

### Docker

`/docker`
The folder in which the dockerfiles are located.

`docker-compose.yml`
This file lets us tell Docker how to build our environment. When we call `docker-compose up` it will read this file and build the necessary containers as well as configure things like networking and volumes.

`docker/app.docker`
This is the Dockerfile for our app container. It just extends the [PHP base image](https://hub.docker.com/_/php/) provided by Docker and installs some extra extensions that Laravel needs (mcrypt and mysql).

`docker/web.docker`
This is the Dockerfile for our web container. It extends the [Nginx base image](https://hub.docker.com/_/nginx/) provided by Docker, and just adds an Nginx config file so our web service knows how to handle requests.

`docker/nginx.conf`
This is the Nginx config file thats added to our web container.

## Articles Used

- [Docker](https://kyleferg.com/laravel-development-with-docker/)
