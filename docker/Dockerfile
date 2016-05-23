FROM php:7.0-fpm

RUN apt-get update && apt-get install -y \
#    php5-memcache \
    git-core

# Install Composer and make it available in the PATH
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

# Symfony application
ENV APP_RUN_MODE dev

COPY . /app/symfony/
WORKDIR /app/symfony/

#RUN chown -R php:php app/cache \
#    && chown -R php:php app/logs

EXPOSE 80
