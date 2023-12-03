FROM php:7.4-apache
COPY . /var/www/html/
RUN apt update
RUN docker-php-ext-install pdo mysqli pdo_mysql
