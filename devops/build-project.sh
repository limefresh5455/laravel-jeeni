#!/bin/bash
sudo apt-get install php8.1 php8.1-mysql php8.1-curl php8.1-ctype php8.1-pdo php8.1-tokenizer
composer install --no-interaction

ln -f -s .env.pipelines .env
php artisan migrate --no-interaction
php artisan key:generate


