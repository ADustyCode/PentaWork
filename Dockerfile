# =========================
# Stage 1: Build Frontend
# =========================
FROM node:20-alpine AS assets-builder
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

# =========================
# Stage 2: PHP App
# =========================
FROM php:8.2-fpm-alpine

WORKDIR /var/www

# Install runtime dependencies + build deps
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

# Copy built assets
COPY --from=assets-builder /app/public/build ./public/build

# Install PHP deps (PRODUCTION)
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Entrypoint
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["entrypoint.sh"]
CMD ["php-fpm"]
