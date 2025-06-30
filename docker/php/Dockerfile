FROM php:8.2-fpm

WORKDIR /var/www

RUN { \
    echo 'deb https://deb.debian.org/debian bookworm main'; \
    echo 'deb https://deb.debian.org/debian-security bookworm-security main'; \
    echo 'deb https://deb.debian.org/debian bookworm-updates main'; \
} > /etc/apt/sources.list

RUN apt-get update && apt-get install -y \
    zip \
    curl \
    wget \
    unzip \
    locales \
    libssl-dev \
    libzip-dev \
    libonig-dev \
    libpng-dev \
    libxml2-dev \
    libmcrypt-dev \
    && apt-get remove --purge -y libssl-dev \
    && apt-get install -y libssl-dev \
    && pecl install mcrypt \
    && docker-php-ext-enable mcrypt \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis \
    && docker-php-ext-install pcntl iconv gd mbstring xml pdo pdo_mysql mysqli \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

COPY composer.json composer.lock ./
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

COPY . .
RUN chown -R www-data:www-data /var/www/storage \
    && chmod -R 775 /var/www/storage \
    && ln -sf /var/www/storage/app/public/uploads /var/www/public/uploads

RUN php artisan key:generate

COPY ./docker/db/docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

WORKDIR /var/www

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["php-fpm"]
