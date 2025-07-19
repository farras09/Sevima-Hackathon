# Gunakan base image PHP 8.2 CLI
FROM php:8.2-cli

# Set environment variable agar tidak interaktif saat build
ENV DEBIAN_FRONTEND=noninteractive

# Install dependencies sistem dan ekstensi PHP yang dibutuhkan
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    libpq-dev \
    iputils-ping \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Set direktori kerja
WORKDIR /var/www/html

# Copy semua file ke container
COPY . .

# Install dependency Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Set permission folder storage & bootstrap (jika perlu)
RUN chmod -R 775 storage bootstrap/cache || true

# Expose port untuk Laravel dev server
EXPOSE 8001

# Jalankan Laravel menggunakan built-in PHP server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8001"]

