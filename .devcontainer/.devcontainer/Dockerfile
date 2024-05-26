FROM php:7.4-apache

# Install required packages and PHP extensions
RUN apt-get update \
    && apt-get install -y default-mysql-server libzip-dev nano \
    && docker-php-ext-install zip mysqli pdo pdo_mysql \
    && docker-php-ext-enable mysqli

# Copy the application code to the container
COPY ./casino /var/www/html

# Add a custom script to start both Apache and MySQL
COPY start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Expose port 80 for Apache
EXPOSE 80 3306

# Set the startup script as the container's entrypoint
ENTRYPOINT ["start.sh"]

