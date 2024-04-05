FROM php:8.3.3

RUN apt-get update -y && apt-get install -y openssl zip unzip git 
RUN apt-get install -y zlib1g-dev libpng-dev libjpeg-dev libfreetype6-dev wget build-essential cmake
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN wget https://libzip.org/download/libzip-1.8.0.tar.gz \
    && tar -xvf libzip-1.8.0.tar.gz \
    && rm libzip-1.8.0.tar.gz \
    && cd libzip-1.8.0 \
    && mkdir build \
    && cd build \
    && cmake .. \
    && make \
    && make install \
    && cd ../.. \
    && rm -rf libzip-1.8.0

RUN docker-php-ext-configure zip \
    && docker-php-ext-install zip

RUN docker-php-ext-configure gd
RUN docker-php-ext-install -j$(nproc) gd

WORKDIR /app
COPY . /app

RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000
