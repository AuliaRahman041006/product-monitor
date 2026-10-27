# Tahap 1: Instal library PHP
FROM php:8.2-cli-alpine AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --prefer-dist --ignore-platform-reqs

# Tahap 2: Runtime Image (Aplikasi Utama)
FROM php:8.2-fpm-alpine
RUN apk add --no-cache nginx supervisor pdo pdo_mysql
WORKDIR /var/www/html

# Salin kode aplikasi
COPY . .
# Salin folder vendor dari tahap 1
COPY --from=vendor /app/vendor/ ./vendor/

# Salin konfigurasi dari folder docker/
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/default.conf /etc/nginx/http.d/default.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh

# Beri izin eksekusi pada entrypoint
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 80
ENTRYPOINT ["entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]