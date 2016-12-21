FROM php:5.6-apache

RUN mkdir -p /var/www/html
WORKDIR /var/www/html

COPY . ./
