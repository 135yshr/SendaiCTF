FROM php:5.6-apache
RUN apt-get update
RUN apt-get install -y mysql-client
RUN docker-php-ext-install pdo_mysql mysqli mbstring
