FROM php:8.2-cli

WORKDIR /usr/app/test

COPY . .

RUN apt-get update && apt-get install -y \
    curl unzip

RUN curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php

RUN php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer

RUN composer install

CMD ["php", "vendor/bin/codecept", "run", "--steps"]