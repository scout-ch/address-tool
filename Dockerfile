FROM php:7.4-fpm-alpine3.12 as builder

WORKDIR /var/www
COPY . .

RUN apk add --update --no-cache nodejs npm yarn

RUN yarn install && yarn prod

RUN curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer
RUN composer install --no-ansi --no-dev --no-interaction --no-plugins --no-progress --no-scripts --optimize-autoloader

FROM php:7.4-fpm-alpine3.12 as production

WORKDIR /var/www
COPY --from=builder /var/www /var/www

RUN apk add --update --no-cache nginx

EXPOSE 80
STOPSIGNAL SIGTERM
CMD ["nginx", "-g", "daemon off;"]
