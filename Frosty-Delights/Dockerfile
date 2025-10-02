# Use official PHP with Apache
FROM php:8.2-apache

# Install required PHP extensions for MySQL (pdo, pdo_mysql)
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite (important for clean URLs in PHP apps)
RUN a2enmod rewrite

# Copy project files into Apache root
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Give permissions (important for session handling)
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 (Render will map it automatically)
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
