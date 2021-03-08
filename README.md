# Api Drone

## Imagens do ambiente docker
- php 7.3
- MariaDB 10.4
- phpMyAdmin

## Configuração
**Iniciar docker**

Abra a pasta root do projeto no terminal, em seguida execute os comandos respeitando a ordem:
- docker-compose build
- docker-compose up -d

**Windows 10**

Certos ambientes windows 10 podem ter dificuldade em reconhecer os dois primeiros comandos do docker-compose, neste caso ignore a etapa  anterior e execute os comandos abaixo em um terminal com acesso de administrador:
- docker compose up -d --build

**Iniciar Lumen**

- docker exec -it api_php /bin/bash
- composer install
- cp .env.example .env
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
