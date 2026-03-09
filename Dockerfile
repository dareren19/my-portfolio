# Use an official PHP image with FPM
FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Install system dependencies & composer
RUN apk add --no-cache \
        bash \
        git \
        unzip \
        libzip-dev \
        oniguruma-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring

# Copy project files
COPY . .

# Install Composer dependencies
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev --optimize-autoloader

# Set Laravel public folder as web root
ENV WEBROOT=/var/www/html/public

# Expose port
EXPOSE 8080

# Start PHP-FPM
CMD ["php-fpm"]
