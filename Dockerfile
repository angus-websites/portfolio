# Stage 1: Composer dependencies
FROM composer:2 as composer
WORKDIR /app
COPY . .
RUN composer install --no-interaction --no-dev --prefer-dist --optimize-autoloader
RUN rm -rf /root/.composer/cache

# Stage 2: Frontend build with Node.js
FROM node:14-alpine AS frontend
WORKDIR /app
COPY package.json package-lock.json webpack.mix.js ./
RUN npm ci
COPY . .
# Copy vendor directory
COPY --from=composer /app/vendor ./vendor
RUN npm run production && npm cache clean --force

# Stage 3: Setup PHP and Laravel
FROM php:8.2-fpm-alpine

# Install system dependencies
RUN apk update && apk add --no-cache \
    curl \
    zip \
    unzip \
    git \
    oniguruma-dev \
    icu-dev \
    libzip-dev \
    nginx

# Configure PHP extensions
RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    zip \
    intl

# Copy vendor files from composer stage
COPY --from=composer /app/vendor /var/www/html/vendor

# Copy frontend build files
COPY --from=frontend /app/public /var/www/html/public

# Copy project files
COPY . /var/www/html

# Set workdir
WORKDIR /var/www/html

# Set folder permissions for Laravel
RUN chmod +rwx /var/www
RUN chmod -R 777 /var/www

# Copy our prod script and set permissions
COPY prod.sh /start.sh
RUN chmod +x /start.sh

# Copy Nginx config file
COPY nginx.conf /etc/nginx/http.d/default.conf

# Expose port 80
EXPOSE 80

# Run our prod script
CMD /bin/sh /start.sh
