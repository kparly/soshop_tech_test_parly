FROM php:7.2-fpm-alpine

RUN apk --no-cache update && apk --no-cache add bash git \
docker-php-ext-install pdo_mysql \
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php composer-setup.php && php -r "unlink('composer-setup.php');" && mv composer.phar /usr/local/bin/composer \
wget https://get.symfony.com/cli/installer -O - | bash && mv /root/.symfony/bin/symfony /usr/local/bin/symfony

WORKDIR /var/www/html