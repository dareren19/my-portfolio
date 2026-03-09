# Official PHP 8.2 FPM image
FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apk add --no-cache bash git unzip libzip-dev oniguruma-dev curl \
    && docker-php-ext-install pdo pdo_mysql zip mbstring

# Copy project files
COPY . .

# Install Composer dependencies
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev --optimize-autoloader

# Laravel public folder
ENV WEBROOT=/var/www/html/public

# Expose the HTTP port for Render
EXPOSE 8080

# Run PHP-FPM in foreground, TCP mode, as www-data
USER www-data
CMD ["php-fpm", "-F", "-R", "-O", "listen=0.0.0.0:8080"]
