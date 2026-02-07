FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
        postgresql-dev \
        bash \
        unzip \
        git \
        curl \
    && docker-php-ext-install pdo pdo_pgsql

#  Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/html

COPY ./app /var/www/html/app

RUN mkdir -p /var/www/html/cache && chown -R www-data:www-data /var/www/html/cache

RUN chown -R www-data:www-data /var/www/html

CMD ["php-fpm"]
