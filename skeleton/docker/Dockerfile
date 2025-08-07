FROM php:8.3-fpm

WORKDIR /var/www
COPY . /var/www/

ARG APP_NAME
ARG APP_ENV
ARG APP_KEY
ARG APP_DEBUG
ARG APP_URL

ARG DB_CONNECTION
ARG DB_HOST
ARG DB_PORT
ARG DB_DATABASE
ARG DB_USERNAME
ARG DB_PASSWORD

ARG SESSION_DRIVER

RUN echo "APP_NAME=$APP_NAME" >> .env && \
    echo "APP_ENV=$APP_ENV" >> .env && \
    echo "APP_KEY=base64:$APP_KEY" >> .env && \
    echo "APP_DEBUG=$APP_DEBUG" >> .env && \
    echo "APP_URL=$APP_URL" >> .env && \
    echo "DB_CONNECTION=$DB_CONNECTION" >> .env && \
    echo "DB_HOST=$DB_HOST" >> .env && \
    echo "DB_PORT=$DB_PORT" >> .env && \
    echo "DB_DATABASE=$DB_DATABASE" >> .env && \
    echo "DB_USERNAME=$DB_USERNAME" >> .env && \
    echo "DB_PASSWORD=$DB_PASSWORD" >> .env && \
    echo "BROADCAST_DRIVER=log" >> .env && \
    echo "CACHE_DRIVER=file" >> .env && \
    echo "SESSION_LIFETIME=120" >> .env && \
    echo "QUEUE_DRIVER=sync" >> .env && \
    echo "SESSION_DRIVER=$SESSION_DRIVER" >> .env

RUN cat .env

### apt-utils é um extensão de recursos do gerenciador de pacotes APT
RUN apt-get update -y && apt-get install -y --no-install-recommends \
    apt-utils \
    supervisor

# dependências recomendadas de desenvolvido para ambiente linux
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip \
    libpng-dev \
    libpq-dev \
    libxml2-dev

RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-install zip iconv simplexml gd fileinfo

# # Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./docker/supervisord/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
### Supervisor permite monitorar e controlar vários processos Linux
### Bastante utilizado para manter processos em Daemon

COPY ./docker/php/extra-php.ini "$PHP_INI_DIR/99_extra.ini"
COPY ./docker/php/extra-php-fpm.conf /etc/php8/php-fpm.d/www.conf

RUN chown www-data:www-data /var/www

COPY --chown=www-data:www-data ./ .
RUN rm -rf vendor

RUN composer update
RUN composer install --no-interaction

RUN apt-get install nginx -y
RUN rm -rf /etc/nginx/sites-enabled/* && rm -rf /etc/nginx/sites-available/*
COPY ./docker/nginx/sites.conf /etc/nginx/sites-enabled/default.conf
COPY ./docker/nginx/error.html /var/www/html/error.html

## Instalação do agente New Relic
#RUN apt-get install -y curl tar
#RUN mkdir -p /opt/newrelic && chown -R www-data:www-data /opt/newrelic
#RUN curl -L https://download.newrelic.com/infrastructure_agent/binaries/linux/noarch/newrelic-infra_linux_1.36.1.tar.gz -o newrelic-infra.tar.gz && \
#    tar -xzf newrelic-infra.tar.gz -C /opt/newrelic && \
#    rm newrelic-infra.tar.gz
#COPY newrelic.yml /opt/newrelic/newrelic.yml

#ENV NEW_RELIC_LICENSE_KEY="d5526b1f3a63b616d186027ba7df633cFFFFNRAL"
#ENV NEW_RELIC_APP_NAME="Template"

RUN apt-get clean && rm -rf /var/lib/apt/lists/*
# RUN apt update -y && apt install nano git -y

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/supervisord.conf"]
