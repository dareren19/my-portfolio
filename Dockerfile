# Use PHP 8.2 FPM Alpine
FROM php:8.2-fpm-alpine

# System deps
RUN apk add --no-cache bash git unzip curl libzip-dev oniguruma-dev icu-dev zip autoconf g++ make

# PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring zip intl opcache

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Working directory
WORKDIR /var/www/html

# Copy composer files first
COPY composer.json composer.lock ./

# Copy .env.example as .env to prevent artisan errors
COPY .env.example .env

# Set permissions for storage and bootstrap/cache before composer
RUN mkdir -p storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Install dependencies safely
RUN composer install --no-dev --optimize-autoloader --prefer-dist

# Copy the rest of the app
COPY . .

# Cache Laravel configs/routes/views
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Set proper permissions for Laravel
RUN chown -R www-data:www-data storage bootstrap/cache public \
    && chmod -R 775 storage bootstrap/cache public

# Env vars
ENV APP_ENV=production \
    APP_DEBUG=false \
    WEBROOT=/var/www/html/public

EXPOSE 8080

CMD ["php-fpm", "-F", "-R"]
