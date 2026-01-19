#!/bin/bash

# Script untuk setup .env file dari .env.example

if [ ! -f .env ]; then
    if [ -f .env.example ]; then
        cp .env.example .env
        echo "File .env berhasil dibuat dari .env.example"
    else
        echo "File .env.example tidak ditemukan!"
        exit 1
    fi
else
    echo "File .env sudah ada"
fi

# Update database configuration untuk Docker
sed -i.bak 's/DB_HOST=.*/DB_HOST=db/' .env
sed -i.bak 's/DB_DATABASE=.*/DB_DATABASE=alkeslab_db/' .env
sed -i.bak 's/DB_USERNAME=.*/DB_USERNAME=alkeslab_user/' .env
sed -i.bak 's/DB_PASSWORD=.*/DB_PASSWORD=password/' .env
sed -i.bak 's/APP_ENV=.*/APP_ENV=local/' .env
sed -i.bak 's/APP_DEBUG=.*/APP_DEBUG=true/' .env
sed -i.bak 's/REDIS_HOST=.*/REDIS_HOST=redis/' .env

# Hapus backup file
rm -f .env.bak

echo "Konfigurasi .env telah diupdate untuk Docker"
