down:
	docker compose down || docker-compose down
up:
	docker compose up -d || docker-compose up
reset: down up
build:
	docker compose build || docker-compose build
install:
	docker compose run php-fpm php composer.phar install
unit-tests:
	docker compose exec php-fpm php vendor/bin/phpunit tests/Unit || docker-compose exec php-fpm php vendor/bin/phpunit tests/Unit
feature-tests:
	docker compose exec php-fpm php vendor/bin/phpunit tests/Feature || docker-compose exec php-fpm php vendor/bin/phpunit tests/Feature
firefox:
	docker compose up -d firefox || docker-compose down firefox
