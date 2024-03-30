#!/bin/bash

clear

# Generate 32 char password
PASS=$(openssl rand -base64 500 | tr -dc 'a-zA-Z0-9' | fold -w 32 | head -n 1)

git submodule update --init --recursive
php composer.phar install --optimize-autoloader
php bin/console assets:install --symlink --relative
php bin/console d:s:u -f
mkdir var/cache/prod
php bin/console cache:clear
mkdir public/uploads
chmod 775 public/uploads
mkdir secure
chmod 775 secure
php bin/console trinity:user create admin devs@beyonit.nl $PASS -s
php bin/console doctrine:database:import src/CmsBundle/sql/settings.sql
php bin/console d:s:u --force