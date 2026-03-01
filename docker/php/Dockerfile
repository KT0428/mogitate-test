FROM php:8.1-fpm

COPY php.ini /usr/local/etc/php/

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www