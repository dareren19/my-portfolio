FROM richarvey/nginx-php-fpm:3.1.6

WORKDIR /var/www/html

COPY . /var/www/html

ENV WEBROOT=/var/www/html/public

RUN composer install --no-dev --optimize-autoloader
