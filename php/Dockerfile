FROM php:8.2.8-fpm-alpine3.18

# ===== system =====
RUN apk add --no-cache \
    bash \
    git \
    unzip \
    curl \
    nodejs \
    npm

# ===== PHP extensions =====
RUN docker-php-ext-install pdo_mysql

# ===== Composer =====
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# ===== yarn (任意) =====
RUN npm install -g yarn

# ===== entrypoint =====
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

WORKDIR /var/www/html/example

ENTRYPOINT ["/entrypoint.sh"]
CMD ["php-fpm"]

