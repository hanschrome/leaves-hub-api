down:
	docker compose down || docker-compose down
up:
	docker compose up || docker-compose up
reset: down up
build:
	docker compose build || docker-compose build
unit-tests:
	docker compose exec php-fpm php vendor/bin/phpunit
