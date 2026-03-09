# Use official PHP 8.2 FPM Alpine image
FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apk add --no-cache \
    bash \
    git \
    unzip \
    libzip-dev \
    oniguruma-dev \
    curl \
    zip \
    supervisor \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Copy project files including pre-built vendor folder
COPY . .

# Set Laravel public folder as web root
ENV WEBROOT=/var/www/html/public

# Expose HTTP port for Render
EXPOSE 8080

# Run PHP-FPM as www-data user on TCP port 8080
USER www-data
CMD ["php-fpm", "-F", "-R", "-O", "listen=0.0.0.0:8080"]
