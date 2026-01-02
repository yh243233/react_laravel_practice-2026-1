#!/bin/sh
set -e

echo "🚀 Container startup"

cd /var/www/html/example

# ===== Laravel =====
if [ -f composer.json ] && [ ! -d vendor ]; then
  echo "📦 composer install"
  composer install --no-interaction --prefer-dist
fi

# ===== .env =====
if [ ! -f .env ] && [ -f .env.example ]; then
  echo "⚙️ create .env"
  cp .env.example .env
fi

# ===== APP_KEY =====
if [ ! -f .env ]; then
  cp .env.example .env
fi

if ! grep -q "^APP_KEY=base64:" .env; then
  echo "🔑 generate APP_KEY"
  php artisan key:generate --force
fi

# ===== permissions =====
echo "🔐 set permissions"
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# ===== frontend =====
if [ -f package.json ] && [ ! -d node_modules ]; then
  echo "📦 npm install"
  npm install
fi

echo "✅ Startup complete"

exec "$@"
