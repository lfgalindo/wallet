FROM php:7.4.21-fpm-alpine3.13

WORKDIR /var/www

RUN apk --update add --no-cache \
	oniguruma-dev \
	libpng-dev \
	openssl-dev \
	nginx \
	supervisor \
	gd \
	nano \
	libxml2-dev \
	postgresql-dev \
	git \
	zip \
	autoconf \
	gcc \
	g++ \
	make \
	&& rm -rf /var/cache/apk/*

RUN docker-php-ext-install \
	pdo \
	pdo_mysql \
	pdo_pgsql \
	mbstring \
	gd \
	soap \
	xml \
	posix \
	tokenizer \
	ctype \
	pcntl \
	opcache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www

RUN chown -R www-data:www-data /var/www

COPY docker/php/laravel-worker.conf /etc/supervisor/conf.d/laravel-worker.conf

COPY docker/php/start.sh ./start.sh

RUN chmod +x ./start.sh && ./start.sh

CMD ["php-fpm"]

EXPOSE 9000
