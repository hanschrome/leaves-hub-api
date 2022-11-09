info:
	cat Makefile
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
	docker compose run php-fpm php vendor/bin/phpunit tests/Unit || docker-compose run php-fpm php vendor/bin/phpunit tests/Unit
feature-tests:
	docker compose down mysql-testing
	docker compose down phpmyadmin-testing
	docker compose down firefox
	docker compose up -d mysql-testing
	sleep 20
	docker compose exec -it mysql-testing mysql -uroot -proot -e "create database laravel;"
	docker compose up -d phpmyadmin-testing
	docker compose run -d firefox firefox http://10.6.0.8
	docker compose up -d php-fpm
	docker compose exec -it php-fpm php artisan migrate
	docker compose exec -it php-fpm php vendor/bin/phpunit tests/Feature
firefox:
	docker compose up -d firefox || docker-compose down firefox
