FROM php:8.4-fpm

RUN apt-get update && apt-get install -y unzip curl git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

WORKDIR /var/www/html
