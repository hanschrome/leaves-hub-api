down:
	docker compose down || docker-compose down
up:
	docker compose -d up || docker-compose up
reset: down up
build:
	docker compose build || docker-compose build
install:
	docker compose run php-fpm php composer.phar install
unit-tests:
	docker compose exec php-fpm php vendor/bin/phpunit
