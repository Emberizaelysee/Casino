FROM node:20-alpine
RUN apk add --no-cache python3 g++ make
WORKDIR /app
COPY . .
RUN yarn install --production
CMD ["node", "/app/src/index.js"]

# Utiliser une image de base avec Apache et MySQL
FROM php:7.4-apache

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Installer MySQL server
RUN apt-get update && \
    apt-get install -y default-mysql-server && \
    apt-get clean

# Configurer MySQL
RUN service mysql start && \
    mysql -u root -e "CREATE DATABASE casino;"

# Copier les fichiers de l'application
COPY . /var/www/html/

# Exposer le port 80 pour Apache et 3306 pour MySQL
EXPOSE 80 3306

# Script d'entrée pour démarrer Apache et MySQL
CMD service mysql start && apache2-foreground
