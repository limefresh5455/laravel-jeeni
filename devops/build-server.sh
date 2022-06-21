#!/bin/bash
php -v
apt-get -qy update
apt -qy instal curl git zip unzip
# apt -qy install npm

#docker-php-ext-install pdo_mysql ctype bcmath zip
apt-get update && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev

curl --silent --show-error https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# composer update
# composer install