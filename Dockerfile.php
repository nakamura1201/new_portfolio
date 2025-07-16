# Dockerfile.php
FROM php:8.2-apache

WORKDIR /var/www/html

# index.php などをコンテナにコピー
COPY ./index.php /var/www/html/index.php

RUN a2enmod rewrite

EXPOSE 80
