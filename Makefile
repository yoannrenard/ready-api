all: build

build:
	docker build -t ready-api -f docker/Dockerfile .

run: stop start-mysql
#	docker run --rm -it --name ready-api -v ~/workspace/ready-api/:/app/symfony ready-api bash
	docker run --rm -it --name ready-api -v ~/workspace/ready-api/:/app/symfony --link ready-mysql:mysql ready-api bash

test-small:
	docker run --rm -it --name ready-api ready-api composer install --prefer-dist -o -n; bin/phpunit -c app/

test-jenkins:
	docker run --rm -it --name ready-api ready-api composer install --prefer-dist -o -n; bin/behat -c app/

start: stop start-mysql
	docker run -it --name ready-api -v ~/workspace/ready-api/:/app/symfony --link ready-mysql:mysql -d ready-api

start-mysql:
	docker run --name ready-mysql -e MYSQL_ROOT_PASSWORD=root -d mysql/mysql-server:5.7

exec:
	docker exec -it ready-api bash

stop:
	@docker rm -vf ready-mysql ||:
	@docker rm -vf ready-api ||:

clean: stop
	@docker rm -f ready-api ||:
	@docker rmi -f ready-api ||:

log:
	docker logs -t --follow --tail=50 ready-api

sync:
	docker cp . ready-api:/app/symfony/

.PHONY: build run start exec stop clean test
