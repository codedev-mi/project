# Use official PHP image with Apache
FROM php:8.2-apache

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Copy your project files to Apache root
COPY . /var/www/html/

# Expose port 80
EXPOSE 80
