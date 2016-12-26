FROM php:5.6-apache

RUN a2enmod rewrite
RUN mkdir -p /var/www/html
WORKDIR /var/www/html

COPY . ./
