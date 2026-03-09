# Base image: PHP 8.2 FPM Alpine
FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apk add --no-cache \
    bash \
    git \
    unzip \
    curl \
    libzip-dev \
    oniguruma-dev \
    supervisor \
    zip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Copy project files
COPY . .

# Set PHP memory limit for Composer
RUN echo "memory_limit=1024M" > /usr/local/etc/php/conf.d/memory.ini

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer

# Install Laravel dependencies safely
RUN php -d memory_limit=1024M /usr/local/bin/composer install \
    --no-dev --optimize-autoloader --prefer-dist --no-scripts

# Set Laravel public folder as web root
ENV WEBROOT=/var/www/html/public

# Expose HTTP port for Render detection
EXPOSE 8080

# Run PHP-FPM as www-data user on TCP port 8080
USER www-data
CMD ["php-fpm", "-F", "-R", "-O", "listen=0.0.0.0:8080"]
