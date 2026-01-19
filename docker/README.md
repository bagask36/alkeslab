# Docker Setup untuk Alkeslab

## Persyaratan
- Docker
- Docker Compose

## Cara Menggunakan

### 1. Build dan jalankan container
```bash
docker-compose up -d --build
```

### 2. Install dependencies
```bash
# Install PHP dependencies
docker-compose exec app composer install

# Install Node dependencies (jika diperlukan)
docker-compose exec node npm install
```

### 3. Setup environment
```bash
# Copy file .env
docker-compose exec app cp .env.example .env

# Generate application key
docker-compose exec app php artisan key:generate

# Run migrations
docker-compose exec app php artisan migrate
```

### 4. Akses aplikasi
- Web: http://localhost:8000
- MySQL: localhost:3306
- Redis: localhost:6379

## Perintah Berguna

### Masuk ke container
```bash
# Masuk ke container PHP
docker-compose exec app bash

# Masuk ke container MySQL
docker-compose exec db mysql -u alkeslab_user -p
```

### Menjalankan artisan commands
```bash
docker-compose exec app php artisan [command]
```

### Menjalankan npm commands
```bash
docker-compose exec node npm [command]
```

### Stop container
```bash
docker-compose down
```

### Stop dan hapus volumes
```bash
docker-compose down -v
```

## Konfigurasi Database

Update file `.env` dengan konfigurasi berikut:
```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=alkeslab_db
DB_USERNAME=alkeslab_user
DB_PASSWORD=password
```

## Struktur Docker

- `Dockerfile` - Konfigurasi image PHP
- `docker-compose.yml` - Konfigurasi semua services
- `docker/nginx/default.conf` - Konfigurasi Nginx
- `docker/php/local.ini` - Konfigurasi PHP
- `docker/mysql/my.cnf` - Konfigurasi MySQL
