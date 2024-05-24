# Use an appropriate base image
FROM mcr.microsoft.com/vscode/devcontainers/universal:latest

# Install Apache, PHP, and MySQL
RUN apt-get update && apt-get install -y apache2 mysql-server php php-mysql php-json php-mbstring php-xml

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Configure Apache
RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Copy application files
COPY . /var/www/html/

# Fix permissions
RUN chown -R www-data:www-data /var/www/html

# Expose necessary ports
EXPOSE 80 3306

# Start Apache and MySQL
CMD ["bash", "-c", "service apache2 start && service mysql start && tail -f /var/log/apache2/error.log /var/log/mysql/error.log"]

FROM node:20-alpine
RUN apk add --no-cache python3 g++ make
WORKDIR /app
COPY . .
RUN yarn install --production
CMD ["node", "/app/src/index.js"]