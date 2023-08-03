#!/bin/sh

# Generate .env file


echo "APP_NAME=${APP_NAME}" > .env
echo "APP_URL=${APP_URL}" >> .env
echo "APP_ENV=${APP_ENV}" >> .env
echo "APP_KEY=${APP_KEY}" >> .env
echo "DB_CONNECTION=${DB_CONNECTION}" >> .env
echo "DB_HOST=${DB_HOST}" >> .env
echo "DB_PORT=${DB_PORT}" >> .env
echo "DB_DATABASE=${DB_DATABASE}" >> .env
echo "DB_USERNAME=${DB_USERNAME}" >> .env
echo "DB_PASSWORD=${DB_PASSWORD}" >> .env

echo "ADMIN_NAME=${ADMIN_NAME}" >> .env
echo "ADMIN_EMAIL=${ADMIN_EMAIL}" >> .env
echo "ADMIN_PASSWORD=${ADMIN_PASSWORD}" >> .env

echo "RECAPTCHA_SITE_KEY=${RECAPTCHA_SITE_KEY}" >> .env
echo "RECAPTCHA_SECRET_KEY=${RECAPTCHA_SECRET_KEY}" >> .env

echo "MAIL_MAILER=${MAIL_MAILER}" >> .env
echo "MAIL_HOST=${MAIL_HOST}" >> .env
echo "MAIL_PORT=${MAIL_PORT}" >> .env
echo "MAIL_USERNAME=${MAIL_USERNAME}" >> .env
echo "MAIL_PASSWORD=${MAIL_PASSWORD}" >> .env
echo "MAIL_ENCRYPTION=${MAIL_ENCRYPTION}" >> .env
echo "MAIL_FROM_ADDRESS=${MAIL_FROM_ADDRESS}" >> .env
echo "MAIL_FROM_NAME=${MAIL_FROM_NAME}" >> .env

# Run our artisan commands

php artisan route:clear

php artisan route:cache

php artisan config:clear

php artisan config:cache

php artisan view:clear

php artisan view:cache

php artisan storage:link

php artisan migrate --force

php artisan optimize

chmod -R 777 storage

# Finally, start PHP-FPM and nginx
php-fpm -D &&  nginx -g "daemon off;"
