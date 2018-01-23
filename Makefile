default: beer

RUN_COMMAND_ON_PHP = docker run --rm --interactive --tty --network 2018phpbeneluxdddworkshop_default --volume `pwd`:/app --user $(id -u):$(id -g) --workdir /app 2018phpbeneluxdddworkshop_php-fpm

beer: down build up install sleepForDatabase clean-database run-migrations

down:
	docker-compose down	

build:
	docker-compose build

up:
	docker-compose up -d

install:
	$(RUN_COMMAND_ON_PHP) composer install

update:
	$(RUN_COMMAND_ON_PHP) composer update

unit:
	$(RUN_COMMAND_ON_PHP) /app/vendor/bin/phpunit --configuration /app/src/Tests/Unit/phpunit.xml.dist

integration:
	$(RUN_COMMAND_ON_PHP) /app/vendor/bin/phpunit --configuration /app/src/Tests/Integration/phpunit.xml.dist

bash:
	$(RUN_COMMAND_ON_PHP) bash

chrome:
	open -a "Google Chrome" http://localhost:62337/

sleepForDatabase:
	@echo "Sleeping while MariaDB loads. I didn't want to cause more Docker problems by using healthcheck"
	sleep 30

clean-database:
	docker run -it --rm --network 2018phpbeneluxdddworkshop_default mariadb:10.1 mysql --host=mariadb --user=root --password=belgium --batch -e "drop database if exists beeriously; create database beeriously;"

run-migrations:
	$(RUN_COMMAND_ON_PHP) /app/bin/console doctrine:migrations:migrate --no-interaction -v

refresh-db: clean-database run-migrations