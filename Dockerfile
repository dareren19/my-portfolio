FROM php:8.2-fpm-alpine

WORKDIR /var/www/html

RUN apk add --no-cache bash git unzip libzip-dev oniguruma-dev curl \
    && docker-php-ext-install pdo pdo_mysql zip mbstring

COPY . .

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev --optimize-autoloader

ENV WEBROOT=/var/www/html/public

EXPOSE 8080

# Start PHP-FPM on TCP port 8080 so Render detects it
CMD ["php-fpm", "-F", "-R", "-O", "listen=0.0.0.0:8080"]
