FROM php:7.4-fpm-alpine

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html
RUN chmod 755 /var/www/html
RUN chmod 755 /var/www/html/storage

RUN docker-php-ext-install pdo pdo_mysql
