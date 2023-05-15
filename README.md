## Docker Setup

## Laravel env Setup
- for .env : edit `docker/configs/laravel-application/.env`

#### for linux
- build images : `make build`
- build + up services : `make up`
- stop services : `make down`
- down + up : `make restart`

#### for windows
- `cd path/to/app directory` then :
    - build images : `docker compose build`
    - up services : `docker compose up -d`
    - build + up services : `docker compose up -d --build`
    - down + up : `docker compose restart`

## Run pgAdmin (PostgreSQL)
- go to http://localhost:5050

- PgAdmin4 username: `hamza@admin.com`
- PgAdmin4 password: `root`

## Add a new server in PgAdmin
- Host name/address : `postgres`
- Port : `5432`
- username : `task_management`
- password : `root`


