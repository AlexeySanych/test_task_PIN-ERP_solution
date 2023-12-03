FROM php:8.1-fpm

WORKDIR /var/www

COPY --chmod=777 ./app /var/www

COPY --chmod=777 ./env /var/www

RUN	php artisan key:generate

RUN apt-get update && apt-get install -y \
     libpq-dev && \
     docker-php-ext-install pdo_pgsql

RUN pecl install redis && docker-php-ext-enable redis

RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache
