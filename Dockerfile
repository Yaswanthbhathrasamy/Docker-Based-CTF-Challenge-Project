# PHP Apache with MySQL client
FROM php:8.1-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Enable apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy source files
COPY ./src/ /var/www/html/

# Set permissions for uploads
RUN mkdir -p /var/www/html/uploads && chown -R www-data:www-data /var/www/html/uploads

# Copy vuln binary and set SUID
COPY ./vuln /usr/local/bin/vuln
RUN chmod +s /usr/local/bin/vuln

EXPOSE 80
CMD ["apache2-foreground"]
