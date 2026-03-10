# Node stage for building assets
FROM node:18 AS node
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# PHP stage
FROM php:8.2-cli AS php

# Install PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy application files
COPY . .

# Copy built assets from node stage
COPY --from=node /app/public/build /var/www/html/public/build

# Install PHP dependencies
RUN composer install --no-dev

# Laravel optimizations
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Set permissions
RUN chmod -R 775 storage bootstrap/cache

EXPOSE ${PORT:-10000}

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-10000}
