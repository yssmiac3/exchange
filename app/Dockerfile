

FROM php:7.4.9-fpm-alpine3.12

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

RUN apk add --update busybox-suid --no-cache autoconf gcc libc-dev make pkgconfig libtool imagemagick-dev imagemagick libxml2-dev tzdata composer npm      \
  && pecl install imagick                                                                                                            \
  && install-php-extensions gd                                                                                                      \
  && docker-php-ext-install soap                                                                                                     \
  && docker-php-ext-enable imagick                                                                                                   \
  && docker-php-ext-install exif                                                                                                     \
  && docker-php-ext-install pdo_mysql                                                                                                \
  && docker-php-ext-install bcmath                                                                                                   \
  && docker-php-ext-install sockets                                                                                                  \
  && apk del --purge -r autoconf gcc libc-dev make pkgconfig libtool

RUN mkdir -p /var/www/app && chown www-data:www-data /var/www/app

WORKDIR /var/www/app

COPY --chown=www-data:www-data composer.json composer.lock /var/www/app/

USER www-data

RUN composer install --no-autoloader

COPY --chown=www-data:www-data webpack.mix.js /var/www/app/

RUN npm install

RUN npm rebuild node-sass

COPY --chown=www-data:www-data . /var/www/app/

RUN npm run dev

RUN composer dump-autoload

# USER root

# COPY cronjobs /etc/crontabs/root

# RUN crontab /etc/crontabs/root
