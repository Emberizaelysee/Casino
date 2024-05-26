#!/bin/bash

# Start MySQL service
service mysql start

# Wait for MySQL to start
sleep 5

# Set up the MySQL root user and create the database if not already done
if [ ! -f /var/lib/mysql/.mysql_initialized ]; then
  mysql -u root -e "CREATE DATABASE casino" \
    && mysqladmin -u root password 'secret' \
    && touch /var/lib/mysql/.mysql_initialized
fi

# Start Apache in the foreground
apache2-foreground
