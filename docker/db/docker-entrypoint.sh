#!/bin/bash
set -e

host="db-service-2"
port="3306"
timeout=60
attempt=0

echo "Waiting for database at $host:$port..."

while ! php -r "mysqli_connect('$host', 'root', 'root', 'wiki', $port) or exit(1); exit(0);"; do
  attempt=$((attempt+1))

  if [ $attempt -ge $timeout ]; then
    echo "Database connection timeout after $timeout seconds!"
    exit 1
  fi

  echo "Attempt $attempt/$timeout: Database not ready. Waiting 2 seconds..."
  sleep 2
done

echo "Database is up - running migrations..."
php artisan migrate --force

#echo "Seeding database..."
#php artisan db:seed --force

exec "$@"
