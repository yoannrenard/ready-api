all: build

build:
	docker build -t ready-api -f docker/Dockerfile .

run:
#	docker run --rm -it --name ready-api -v ~/workspace/ready-api/:/app/symfony ready-api bash
	docker run --rm -it --name ready-api ready-api bash

test-small:
	docker run --rm -it --name ready-api ready-api composer install --prefer-dist -o -n; bin/phpunit -c app/

test-jenkins:
	docker run --rm -it --name ready-api ready-api composer install --prefer-dist -o -n; bin/behat -c app/

#logtail:
#	docker exec -it ready-api tail -f /var/log/apache2/error.log

start: stop
	docker run -d --name ready-api ready-api

exec:
	docker exec -it ready-api bash

stop:
	@docker rm -vf ready-api ||:

clean: stop
	@docker rm -f ready-api ||:
	@docker rmi -f ready-api ||:

log:
	docker logs -t --follow --tail=50 ready-api

sync:
#	lsyncd docker/lsync.lua
	docker cp . ready-api:/app/symfony/

.PHONY: build run start exec stop clean test
