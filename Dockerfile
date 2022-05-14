FROM php:8-apache

RUN apt-get update && apt-get install -y --fix-missing \
    apt-utils \
    gnupg

RUN apt-get update && apt-get install -y \
    libzip-dev \
    libssl-dev \
    libicu-dev \
    libonig-dev

# Installing required extensions for the PHP.
RUN docker-php-ext-install pdo pdo_mysql mysqli zip intl


ENV APACHE_DOCUMENT_ROOT /var/www/html/public_html

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Add rewrite engine for APACHE
RUN a2enmod rewrite headers

# Create a non-root user
RUN useradd --create-home --shell /bin/bash --groups sudo f3api
# Run as the User.
USER f3api

## FatFree Configuration
ARG TZ=Asia/Jakarta
ENV TZ=${TZ}
ARG DEBUG=1
ENV DEBUG=${DEBUG}

## App-based configuration
ARG DB_DSN=""
ENV DB_DSN=${DB_DSN}

ARG DB_USERNAME=""
ENV DB_USERNAME=${DB_USERNAME}

ARG DB_PASSWORD=""
ENV DB_PASSWORD=${DB_PASSWORD}