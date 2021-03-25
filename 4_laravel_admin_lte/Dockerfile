FROM ubuntu:20.04

USER root

# Need for tzdata
ENV DEBIAN_FRONTEND=noninteractive

# Update all packages
RUN apt-get update

# Tools
RUN apt-get install -yq --no-install-recommends \
    git \
    apt-utils \
    curl \
    openssl \
    nano \
    graphicsmagick \
    iputils-ping \
    ca-certificates \
    imagemagick

# Nginx
RUN apt-get install -yq --no-install-recommends nginx

RUN apt-get update && \
    apt-get install -y libxml2-dev

# PHP 7.4
RUN apt-get install software-properties-common -y && add-apt-repository ppa:ondrej/php
RUN apt-get install -yq --no-install-recommends \
    php7.4 \
    php7.4-cli \
    php7.4-fpm \
    php7.4-json \
    php7.4-curl \
    php7.4-mbstring \
    php7.4-mysql \
    php7.4-xml \
    php7.4-zip \
    mysql-client
# PHP EXTS
RUN apt-get install -yq --no-install-recommends \
    php7.4-gd \
    php7.4-bcmath \
    php7.4-imagick \
    php7.4-simplexml \
    php7.4-soap

# Install composer (only with php)
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# Node & Npm
RUN curl -sL https://deb.nodesource.com/setup_10.x | bash -
RUN apt install -y nodejs

WORKDIR /var/www

# set polices
RUN chown -R www-data:www-data /var/www/

# CMD service php7.4-fpm start ; nginx -g 'daemon off;' ;
CMD ["sh", "entrypoint.sh"]
