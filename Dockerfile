# Menggunakan base image PHP 8.2 dengan Apache
FROM php:8.2-apache

# Install sistem dependensi untuk Laravel
RUN apt-get update && apt-get install -y \
    curl \
    gnupg \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    git

# Install NodeJS 20
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Tambahkan ini di Dockerfile setelah bagian RUN apt-get install ...
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP extensions yang dibutuhkan Laravel
RUN docker-php-ext-install pdo_mysql gd zip

# Aktifkan mod_rewrite Apache untuk Laravel
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Salin semua file proyek ke dalam container
COPY . .

# Install dependency Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Set permission
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Konfigurasi Apache agar mengarah ke folder public
RUN sed -i 's/var\/www\/html/var\/www\/html\/public/g' /etc/apache2/sites-available/000-default.conf

# Buka port 80
EXPOSE 80
