#!/bin/sh
# Atur izin folder storage
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Tunggu database siap, lalu jalankan migrasi
echo "Menunggu database siap..."
sleep 10
php artisan migrate --force

# Jalankan proses utama (Supervisor)
exec "$@"