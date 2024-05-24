# Use an appropriate base image
FROM mcr.microsoft.com/vscode/devcontainers/base:0-buster

# Install Apache, PHP, MySQL, and other dependencies
RUN apt-get update && apt-get install -y \
    apache2 php mysql-server \
    php-mysql php-json php-mbstring php-xml \
    && apt-get clean && rm -rf /var/lib/apt/lists/* \
    && sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf \
    && a2enmod rewrite

# Expose ports for Apache and MySQL
EXPOSE 80
EXPOSE 3306

# Copy your application files
COPY . /var/www/html/

# Set up MySQL directory permissions
RUN chown -R mysql:mysql /var/lib/mysql /var/run/mysqld && \
    chmod 755 /var/lib/mysql /var/run/mysqld

# Add MySQL configuration file (if needed)
COPY my.cnf /etc/mysql/my.cnf

# Add Apache configuration file (if needed)
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Start Apache and MySQL services
CMD ["bash", "-c", "service apache2 start && service mysql start && tail -f /dev/null"]
