#!/bin/bash

setfacl -R -m u:nginx:rwX  /var/www/public/laravel*/bootstrap/cache
setfacl -R -m u:nginx:rwX /var/www/public/laravel*/storage/logs /var/www/public/laravel*/storage/framework
setfacl -Rm u:nginx:rwx /var/www/public/laravel*/bootstrap/cache /var/www/public/laravel*/storage

sudo find /var/www -type f -exec chmod 644 {} \;
sudo find /var/www -type d -exec chmod 755 {} \;
sudo chgrp -R nginx /var/www/public/laravel*/storage/ /var/www/public/laravel*/bootstrap/cache
sudo chmod -R ug+rwx /var/www/public/laravel*/storage/ /var/www/public/laravel*/bootstrap/cache

setfacl -Rn -m u:nginx:rwX /var/www/public/laravel*/bootstrap/cache
setfacl -Rn -m u:nginx:rwX /var/www/public/laravel*/storage/framework
setfacl -Rn -m u:nginx:rwX /var/www/public/laravel*/storage/logs

