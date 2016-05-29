#FROM php:7.0-fpm
FROM debian:jessie

RUN echo 'deb http://packages.dotdeb.org jessie all' >> /etc/apt/sources.list
RUN echo 'deb http://nginx.org/packages/debian/ jessie nginx' >> /etc/apt/sources.list
RUN echo 'deb-src http://nginx.org/packages/debian/ jessie nginx' >> /etc/apt/sources.list

RUN apt-get update && apt-get install -yqq --force-yes \
    php7.0-fpm \
    php7.0-mysql \
    mysql-client \
    curl \
    git-core \
    nginx

# Install Composer and make it available in the PATH
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

# Symfony application
ENV APP_RUN_MODE dev

#ENV SYMFONY__DATABASE__USER     root
#ENV SYMFONY__DATABASE__PASSWORD ${MYSQL_ENV_MYSQL_ROOT_PASSWORD}
#ENV SYMFONY__DATABASE__HOST     ${MYSQL_PORT_3306_TCP_ADDR}
#ENV SYMFONY__DATABASE__PORT     ${MYSQL_PORT_3306_TCP_PORT}
#ENV SYMFONY__DATABASE__NAME     ready

#COPY . /var/www/ready-api/
WORKDIR /var/www/ready-api/

COPY docker/config/ready.conf /etc/nginx/conf.d/ready.conf

#RUN composer install

USER root
RUN chown -R www-data:www-data .
#RUN chgrp -R www-data /var/www/ready-api/
#RUN chmod -R g+w /var/www/ready-api/
#USER www-data

EXPOSE 80
