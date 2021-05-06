#!/bin/bash

cd /home/ec2-user

sudo rm -rf devops_homologated_php_frameworks/ /var/www/public/

git clone https://github.com/FerraBraiZ/devops_homologated_php_frameworks.git

sudo cp -R devops_homologated_php_frameworks/* /var/www/

sudo rm -rf devops_homologated_php_frameworks/



