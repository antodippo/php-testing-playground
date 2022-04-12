FROM php:8.1-cli

RUN apt-get update
RUN apt-get install -y git zip unzip

RUN pecl channel-update pecl.php.net
RUN pecl install xdebug && docker-php-ext-enable xdebug
ENV XDEBUG_MODE=coverage

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_CACHE_DIR=/root/.composer/cache