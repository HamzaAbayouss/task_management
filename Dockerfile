FROM php:8.1-apache

RUN apt-get update && \
    apt-get install zip unzip && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql && \
    a2enmod rewrite

RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm composer-setup.php

COPY ./src /var/www/html/
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install --ignore-platform-reqs

RUN chown -R www-data:www-data storage && \
    chmod -R 775 storage && \
    chown -R www-data:www-data bootstrap/cache && \
    chmod -R 775 bootstrap/cache

COPY docker/configs/apache-application/000-default.conf /etc/apache2/sites-available/.

CMD ["apache2-foreground"]
