FROM php:8.5.4-fpm-alpine3.22

WORKDIR /var/www/html/

ENV PHP_INI_DIR /usr/local/etc/php

RUN apk add --no-cache ${PHPIZE_DEPS} \
    && apk add --update linux-headers

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# for composer
RUN mkdir /var/www/html/app/
WORKDIR /var/www/html/app/
#COPY ../websites/composer.json .
#RUN composer install
#RUN composer autoload-dump

#ENV APP_ENV production
ENV APP_DEBUG true

LABEL maintainer="Mohammed Saleh <mohammed.saleh@tuta.io>"
LABEL version="1.0"
LABEL description="Docker image for PHP 8.5 FPM"

COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdeub.ini

EXPOSE 9000

CMD php-fpm