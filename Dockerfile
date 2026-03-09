# Use official PHP 8.2 FPM Alpine image
FROM php:8.2-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    bash \
    git \
    unzip \
    curl \
    libzip-dev \
    oniguruma-dev \
    icu-dev \
    zip \
    autoconf \
    g++ \
    make \
    && docker-php-ext-install pdo pdo_mysql mbstring zip intl opcache

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy composer files first for better caching
COPY composer.json composer.lock ./

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --prefer-dist

# Copy the rest of the application
COPY . .

# Cache Laravel configs, routes, views
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Set permissions (www-data user)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Set environment variables
ENV APP_ENV=production \
    APP_DEBUG=false \
    WEBROOT=/var/www/html/public

# Expose port 8080 for Render
EXPOSE 8080

# Use PHP-FPM as entrypoint
CMD ["php-fpm", "-F", "-R", "-O", "-y", "/usr/local/etc/php-fpm.conf", "-R"]
