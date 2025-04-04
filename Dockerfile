FROM php:8.4-cli

RUN apt-get update && \
    apt-get install -y zip unzip git && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

COPY --from=composer:2.7.1 /usr/bin/composer /usr/bin/composer

ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN install-php-extensions operator
