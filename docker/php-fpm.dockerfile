FROM php:7.4-fpm

# ставим кучу пакетов, которые нужны для работы php
RUN apt-get update && apt-get install -y \
    build-essential \
    libzip-dev \
    libmemcached-dev \
    libz-dev \
    libpq-dev \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    libssl-dev \
    libmcrypt-dev \
    libonig-dev \
    locales \
    zip \
    unzip \
    curl \
    cron \
    mc \
    git \
    rename \
    && apt-get clean && rm -rf /var/lib/apt/lists/*
# Clear cache
# RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN set -eux; \
    # Install the PHP pdo_mysql extention
    docker-php-ext-install pdo_mysql; \
    docker-php-ext-install mysqli; \
#    docker-php-ext-install mcrypt; \
    # Install the PHP pdo_pgsql extention
    # docker-php-ext-install pdo_pgsql; \
    docker-php-ext-install bcmath; \
    docker-php-ext-install zip; \
    docker-php-ext-install exif; \
    docker-php-ext-install pcntl; \
    # Install the PHP gd library
    docker-php-ext-configure gd \
            --prefix=/usr \
            --with-jpeg \
#            --with-freetype-dir \
            --with-freetype; \
    docker-php-ext-install gd; \
    # php -r 'var_dump(gd_info());'
    pecl install memcache-4.0.5.2 \
    && docker-php-ext-enable memcache \
    && pecl install mcrypt-1.0.4 \
    && docker-php-ext-enable mcrypt

# php драйвер для работы с redis
# RUN pecl install redis-5.2.2 \
# 	# xdebug
#     && pecl install xdebug-2.9.6 \
#     && docker-php-ext-enable redis xdebug

#RUN pecl install pecl_http-3.2.2 \
#    && pecl install mcrypt- \
#    && docker-php-ext-enable pecl_http mcrypt
#    && docker-php-ext-enable pecl_http

# Install composer and add its bin to the PATH.
RUN curl -s http://getcomposer.org/installer | php && \
    echo "export PATH=${PATH}:/var/www/vendor/bin" >> ~/.bashrc && \
    mv composer.phar /usr/local/bin/composer
# RUN curl -sL https://deb.nodesource.com/setup_14.x | bash - && \
#     apt-get install -y nodejs

# COPY ./php-fpm/project.ini /usr/local/etc/php/conf.d

# RUN mkdir -p /root/.ssh
# COPY ./ssh/id_rsa /root/.ssh/id_rsa
# RUN chmod 600 /root/.ssh/id_rsa
# RUN echo "StrictHostKeyChecking no\nIdentityFile /root/.ssh/id_rsa\n" >> /root/.ssh/config

WORKDIR /var/www/app
