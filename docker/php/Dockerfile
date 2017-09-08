FROM php:7-fpm

RUN apt-get update && apt-get install -y libjpeg-dev libfontconfig-dev libxrender1 libxtst6
RUN pecl install -o -f xdebug

echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20160303/xdebug.so" > /etc/php/7.0/mods-available/xdebug.ini

