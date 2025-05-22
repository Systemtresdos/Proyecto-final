FROM composer:latest
RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel
USER laravel
WORKDIR /var/www/html
ENV COMPOSER_HOME="/home/laravel/.composer"
ENV PATH="/home/laravel/.composer/vendor/bin:/home/laravel/.config/composer/vendor/bin:${PATH}"
RUN composer global require laravel/installer
# ENTRYPOINT [ "composer", "--ignore-platform-reqs" ]