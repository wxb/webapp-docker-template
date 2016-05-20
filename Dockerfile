FROM richarvey/nginx-php-fpm
MAINTAINER wangxb <wxb0328@gmail.com>

RUN rm -f /usr/share/nginx/html/*

COPY . /usr/share/nginx/html

RUN chown -R www-data:www-data /usr/share/nginx/html
