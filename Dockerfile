FROM php:8.1-apache

RUN mkdir -p /var/www/html/

WORKDIR /var/www/html/

COPY . .

# Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Update aptitude with new repo
RUN apt-get update

# Install software 
RUN apt-get install -y git

RUN apt-get install zip unzip

RUN composer install

EXPOSE 80