#FROM php:7.0-fpm
FROM debian:jessie

RUN echo 'deb http://packages.dotdeb.org jessie all' >> /etc/apt/sources.list

RUN apt-get update && apt-get install -yqq --force-yes \
    php7.0-fpm \
    php7.0-mysql \
    mysql-client \
    curl \
    git-core

# Install Composer and make it available in the PATH
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

# Symfony application
ENV APP_RUN_MODE dev

#ENV SYMFONY__DATABASE__USER     root
#ENV SYMFONY__DATABASE__PASSWORD ${MYSQL_ENV_MYSQL_ROOT_PASSWORD}
#ENV SYMFONY__DATABASE__HOST     ${MYSQL_PORT_3306_TCP_ADDR}
#ENV SYMFONY__DATABASE__PORT     ${MYSQL_PORT_3306_TCP_PORT}
#ENV SYMFONY__DATABASE__NAME     ready

#COPY . /app/symfony/
WORKDIR /app/symfony/

#RUN composer install

#RUN chown -R php:php app/cache \
#    && chown -R php:php app/logs

EXPOSE 80
