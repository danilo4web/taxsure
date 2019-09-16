FROM php:7.1-apache
WORKDIR /var/www/html

RUN docker-php-ext-install mbstring pdo pdo_mysql mysqli
RUN docker-php-ext-enable mysqli
RUN a2enmod rewrite

RUN mkdir /var/www/taxsure
COPY . /var/www/taxsure/
COPY ./public/.htaccess /var/www/taxsure/public/.htaccess

RUN ln -s /var/www/taxsure/public/* /var/www/html/
RUN ln -s /var/www/taxsure/public/.htaccess /var/www/html/.htaccess
