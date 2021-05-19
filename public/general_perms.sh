#!/bin/bash

mkdir -p /var/log/php-fpm/
touch /var/log/php-fpm/www-error.log
touch /var/log/php-fpm/www-slow.log
chmod 644 /var/log/php-fpm/www-error.log
chmod 644 /var/log/php-fpm/www-slow.log
chown apache:apache /var/log/php-fpm/www-error.log
chown apache:apache /var/log/php-fpm/www-slow.log



