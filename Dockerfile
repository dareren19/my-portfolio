FROM node:20 as node
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

FROM php:8.2-fpm
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
COPY . .
COPY --from=node /app/public/build /var/www/html/public/build

RUN composer install --no-dev \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

CMD php artisan serve --host=0.0.0.0 --port=${PORT}