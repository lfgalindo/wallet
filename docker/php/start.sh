#!/bin/sh

set -e

cd /var/www

composer install --optimize-autoloader --no-dev

php artisan key:generate
php artisan config:cache
php artisan route:cache
php artisan view:cache
