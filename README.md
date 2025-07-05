# Currency Converter

## Prerequisites 

- Composer
- Docker Desktop
- 

## Application setup

Install Composer packages

`composer install`

Start Docker containers for Mailhog and Postgres

`docker compose up --build -d`

Start the local Symfony server

`symfony server:start`

## Authentication

### To get an access token

Linux or MacOS

`curl -X POST -H "Content-Type: application/json" https://{{BASE_URL}}/api/login_check -d '{"username":"johndoe","password":"test"}'`

Windows

`C:\> curl -X POST -H "Content-Type: application/json" https://{BASE_URL}/api/login_check --data {\"username\":\"johndoe\",\"password\":\"test\"}`

