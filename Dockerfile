# Base image: PHP 8.2 FPM Alpine
FROM php:8.2-fpm-alpine



# Install system dependencies
RUN apk add --no-cache \
    bash \
    git \
    unzip \
    curl \
    libzip-dev \
    oniguruma-dev \
    zip \
    supervisor \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Copy project files including pre-built vendor folder
COPY . .

RUN composer install --no-dev --optimize-autoloader

