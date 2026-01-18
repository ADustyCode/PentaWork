# =========================
# Stage 1: Build Frontend
# =========================
FROM node:20-alpine AS assets-builder
WORKDIR /app

# Copy package.json dan package-lock.json
COPY package*.json ./

# Install dependencies
RUN npm ci

# Copy source frontend
COPY . .

# Build frontend assets
RUN npm run build

# =========================
# Stage 2: PHP App
# =========================
FROM php:8.2-fpm-alpine

WORKDIR /var/www

# Install runtime + build dependencies
RUN apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        icu-dev \
        libpng-dev \
        libzip-dev \
        oniguruma-dev \
    && apk add --no-cache \
        icu \
        libpng \
        libzip \
        zip \
        unzip \
        git \
        curl \
    && docker-php-ext-configure gd \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        bcmath \
        gd \
        zip \
        intl \
    && apk del .build-deps

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy app source
COPY . .

# Copy built frontend assets
COPY --from=assets-builder /app/public/build ./public/build

# Install PHP dependencies (PRODUCTION)
RUN COMPOSER_MEMORY_LIMIT=-1 composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction

# Set proper permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Entrypoint
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["entrypoint.sh"]
CMD ["php-fpm"]
