FROM mcr.microsoft.com/vscode/devcontainers/base:0-buster

# Install Apache and MySQL
RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
    && apt-get -y install --no-install-recommends apache2 mysql-server \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Additional configuration for Apache (e.g., virtual hosts)
# COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Additional configuration for MySQL (e.g., create database and user)
# COPY init-db.sql /docker-entrypoint-initdb.d/

# Start Apache and MySQL services
RUN service apache2 start && service mysql start

# Expose ports for Apache and MySQL
EXPOSE 80
EXPOSE 3306
