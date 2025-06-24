FROM php:8.2-fpm

WORKDIR /var/www

RUN echo "deb https://deb.debian.org/debian/ stable main" > /etc/apt/sources.list
RUN apt-get update && apt-get install -y \
    zip \
    curl \
    wget \
    unzip \
    locales \
    libzip-dev \
    libonig-dev \
    libpng-dev \
    libxml2-dev \
    libmcrypt-dev \
    && pecl install mcrypt \
    && docker-php-ext-enable mcrypt \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    && docker-php-ext-enable redis \
    && docker-php-ext-install pcntl iconv gd mbstring xml pdo pdo_mysql \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

# Встановлення Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Перевіряємо існування директорії перед її створенням
RUN mkdir -p /var/www/storage/app/public/uploads
RUN mkdir -p /var/www/public/uploads

# Перевіряємо наявність символічного посилання
RUN ln -sf /var/www/storage/app/public/uploads /var/www/public/uploads

# Встановлюємо залежності Composer
RUN composer install --no-interaction --prefer-dist

RUN php artisan key:generate

#php artisan kay:generate
RUN php artisan migrate --force

WORKDIR /var/www
CMD ["php-fpm"]
