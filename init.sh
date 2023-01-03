#!/bin/sh
composer install --no-dev --optimize-autoloader
php artisan key:generate
php artisan migrate --seed
