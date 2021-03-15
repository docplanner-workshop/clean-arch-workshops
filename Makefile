start-containers:
	docker-compose up -d --force-recreate

stop-containers:
	docker-compose down

composer-install:
	docker-compose exec php-fpm ./composer.phar install

generate-migrations-diff:
	docker-compose exec php-fpm ./bin/console doctrine:migrations:diff

migrate:
	docker-compose exec php-fpm ./bin/console migrate

run-tests:
	docker-compose exec php-fpm ./vendor/bin/phpunit tests/ -vvvv
