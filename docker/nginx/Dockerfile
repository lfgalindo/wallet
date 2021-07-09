FROM nginx:1.20.1-alpine

COPY docker/nginx/nginx.conf /etc/nginx/nginx.conf

COPY docker/nginx/sites /etc/nginx/sites-available

COPY docker/nginx/conf.d /etc/nginx/conf.d

COPY public /var/www/public

CMD ["nginx"]

EXPOSE 80 443
