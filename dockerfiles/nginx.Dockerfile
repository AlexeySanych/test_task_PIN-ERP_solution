FROM nginx:latest

COPY ./app /var/www

COPY ./nginx/conf.d /etc/nginx/conf.d