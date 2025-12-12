# Base image: PHP 8.4 FPM
FROM php:8.4-fpm

# Install system dependencies and PHP extensions required by Symfony
RUN apt-get update && apt-get install -y \
    git unzip curl libicu-dev libpq-dev libzip-dev libonig-dev \
    && docker-php-ext-install \
        intl \
        pdo \
        pdo_mysql \
        pdo_pgsql \
        zip \
        opcache

# Install Composer (copied from official composer image)
# COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy composer files first (better caching)
# COPY composer.json composer.lock ./

# Install PHP dependencies
# RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# Copy the rest of the project
COPY . .

# Ensure cache/logs are writable
RUN mkdir -p var/cache var/log && chown -R www-data:www-data var

# Expose FPM port
EXPOSE 9000

# Default command
CMD ["php-fpm"]
