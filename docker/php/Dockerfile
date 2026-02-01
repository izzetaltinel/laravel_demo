FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev \
 && docker-php-ext-install pdo_mysql zip\
 && rm -rf /var/lib/apt/lists/*
