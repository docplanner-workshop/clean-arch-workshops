start-containers:
	docker-compose up -d --force-recreate

start-containers-with-install:
	docker-compose up -d --force-recreate
	docker-compose exec php-fpm ./composer.phar install
	make migrate

stop-containers:
	docker-compose down

composer-install:
	docker-compose exec php-fpm ./composer.phar install

generate-migrations-diff:
	docker-compose exec php-fpm ./bin/console doctrine:migrations:diff

migrate:
	docker-compose exec php-fpm ./bin/console doctrine:migrations:migrate

run-tests:
	docker-compose exec -e APP_ENV=test php-fpm ./vendor/bin/phpunit tests/ -vvvv
