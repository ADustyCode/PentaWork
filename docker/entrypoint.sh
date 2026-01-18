#!/bin/sh
set -e

# Run migrations automatically (optional)
php artisan migrate --force

# Start PHP-FPM
exec "$@"
