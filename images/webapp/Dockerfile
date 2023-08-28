FROM php:8.1.22-apache-bookworm

ENV ROOT_URL=""
ENV DB_HOSTNAME=""
ENV DB_USERNAME=""
ENV DB_PASSWORD=""
ENV DB_SCHEMA=""
ENV DB_PORT=""

WORKDIR /var/www/html

COPY ../../assets ./assets/
COPY ../../*.php .
COPY ../../composer.* .
COPY ../../data ./data/
COPY ../../inc ./inc/
COPY ../../model ./model/
COPY ../../vendor ./vendor/
COPY ../../.env .
COPY ../../view ./view/
COPY ./images/webapp/conf/docker-php.conf /etc/apache2/conf-available

RUN apt update && docker-php-ext-install pdo pdo_mysql && a2enmod rewrite headers
EXPOSE 80