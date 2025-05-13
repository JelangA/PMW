FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/pmw

# Install dependencies tanpa apk update
RUN apk add --no-cache \
    curl \
    libpng-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    icu-dev

# Install ekstensi PHP
RUN docker-php-ext-install pdo pdo_mysql intl zip \
    && apk --no-cache add nodejs npm

# Atur batas memory PHP (opsional: ganti 512M sesuai kebutuhan)
RUN echo "memory_limit=512M" > /usr/local/etc/php/conf.d/memory-limit.ini

# Copy Composer dari image resmi
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Set permission hanya untuk Laravel
RUN chmod -R 775 /var/www/pmw

# Gunakan user root hanya jika diperlukan
USER root

