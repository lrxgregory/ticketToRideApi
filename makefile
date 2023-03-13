#VARIABLES
DOCKER = docker
DOCKER_COMPOSER = docker-compose
PHP_BIN_CONSOLE = php bin/console

docker-up: 
	$(DOCKER_COMPOSER) up -d
docker-stop: 
	$(DOCKER_COMPOSER) stop

server-start:
	symfony server:start

start: 
	$(MAKE) docker-up
	$(MAKE) server-start

entity:
	$(PHP_BIN_CONSOLE) make:entity

fixtures:
	$(PHP_BIN_CONSOLE) doctrine:fixtures:load

migration:
	$(PHP_BIN_CONSOLE) make:migration

migrate:
	$(PHP_BIN_CONSOLE) make:migrate

cache:
	$(PHP_BIN_CONSOLE) cache:clear