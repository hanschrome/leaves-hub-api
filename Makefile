serve:
	docker compose run leaves-hub-api php artisan serve --host=0.0.0.0 || docker-compose run leaves-hub-api php artisan serve --host=0.0.0.0
