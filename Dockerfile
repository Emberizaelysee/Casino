FROM mcr.microsoft.com/vscode/devcontainers/base:0-buster

# Install Apache, PHP, MySQL, and other dependencies
RUN apt-get update && apt-get install -y apache2 php mysql-server \
       php-mysql php-json php-mbstring php-xml \
    && apt-get clean && rm -rf /var/lib/apt/lists/* \
    && sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf \
    && a2enmod rewrite

# Expose ports for Apache and MySQL
EXPOSE 80
EXPOSE 3306

# Start Apache and MySQL services
ENTRYPOINT ["/bin/bash", "-c", "service apache2 start && service mysql start && tail -f /dev/null"]
