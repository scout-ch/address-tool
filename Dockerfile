FROM php:7.4-fpm-alpine as builder

WORKDIR /var/www
COPY ./source/ .

RUN apk add --update --no-cache nodejs npm yarn

RUN yarn install && yarn prod

RUN curl -s https://getcomposer.org/installer | php
RUN php composer.phar install --no-ansi --no-dev --no-interaction --no-plugins --no-progress --no-scripts --optimize-autoloader

FROM nginx:1.19-alpine as production

WORKDIR /var/www
COPY --from=builder /var/www /var/www

COPY docker-config/nginx/default.conf /etc/nginx/conf.d/default.conf

EXPOSE 80
STOPSIGNAL SIGTERM
CMD ["nginx", "-g", "daemon off;"]
