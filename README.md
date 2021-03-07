# Api Drone

## Requisitos
- php 7.3
- MariaDB 10.4
- phpMyAdmin

## Configuração
Abra a pasta root do projeto no terminal, em seguida execute os comandos respeitando a ordem:
- composer install
- cp .env.example .env
- docker-compose build
- docker-compose up -d
- docker exec -it api_php /bin/bash
- php artisan migrate
- php artisan db:seed

## Endpoints
- List: GET http://localhost:8080/drones
- Insert: POST http://localhost:8080/drones
- Update: PUT http://localhost:8080/drones/1
- Delete: DELETE http://localhost:8080/drones/1
- Create: POST http://localhost:8080/drones/1
- Paginate: GET http://localhost:8080/drones?_page=1&_limit=1
- Sort: GET http://localhost:8080/drones?_sort=id&_order=asc
- Filter: GET http://localhost:8080/drones?status=success
