FROM php:8.2-apache

# Enable PDO and MySQL extensions
RUN docker-php-ext-install pdo pdo_mysql

# Copy app files
COPY . /var/www/html/

# Expose port 80
EXPOSE 80
