# Base image
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && \
    apt-get install -y \
        libonig-dev \
        libxml2-dev \
        zip \
        unzip \
        curl \
        git

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath opcache

# Enable Apache rewrite module
RUN a2enmod rewrite

# Copy project files
COPY . /var/www/html


# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set memory limit for Composer
ENV COMPOSER_MEMORY_LIMIT=-1

# Install project dependencies
RUN composer install --optimize-autoloader --no-dev

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Start Apache server
CMD ["/usr/sbin/apachectl", "-D", "FOREGROUND"]

# Expose port
EXPOSE 80
