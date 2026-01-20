# Panduan Deployment Laravel ke cPanel Shared Hosting

## Struktur Folder di Server

Jika root domain sudah diarahkan ke folder `/public`, struktur di server akan seperti ini:

```
/home/username/public_html/  (atau /public_html/)
├── index.php
├── .htaccess
├── storage/ (symlink)
└── ... (file lainnya dari public/)
```

Dan folder Laravel lainnya berada di:
```
/home/username/
├── app/
├── bootstrap/
├── config/
├── database/
├── resources/
├── routes/
├── storage/
├── vendor/
├── .env
├── artisan
└── composer.json
```

## Langkah-langkah Deployment

### 1. Upload File ke Server

**Opsi A: Upload semua file ke root (jika root = public_html)**
- Upload semua isi folder `public/` ke `public_html/`
- Upload folder `app/`, `bootstrap/`, `config/`, `database/`, `resources/`, `routes/`, `storage/`, `vendor/` ke satu level di atas `public_html/` (misal: `/home/username/`)

**Opsi B: Upload ke subfolder (jika root = public_html)**
- Buat folder `laravel/` di `/home/username/`
- Upload semua file Laravel ke `/home/username/laravel/`
- Upload isi folder `public/` ke `public_html/`
- Edit `public_html/index.php` untuk menyesuaikan path

### 2. Edit `public/index.php` (jika perlu)

Jika file Laravel berada di folder berbeda, sesuaikan path di `public/index.php`:

```php
// Jika Laravel di satu level di atas public_html
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

// Jika Laravel di folder laravel/
require __DIR__.'/../laravel/vendor/autoload.php';
$app = require_once __DIR__.'/../laravel/bootstrap/app.php';
```

### 3. Buat File `.env` di Server

Buat file `.env` di root Laravel (satu level di atas `public/`) dengan konfigurasi:

```env
APP_NAME="Alkes Lab"
APP_ENV=production
APP_KEY=base64:YOUR_APP_KEY_HERE
APP_DEBUG=false
APP_URL=https://yourdomain.com

LOG_CHANNEL=stack
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

**Generate APP_KEY:**
```bash
php artisan key:generate
```

### 4. Set Permission Folder

Set permission untuk folder `storage/` dan `bootstrap/cache/`:

```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

Atau via cPanel File Manager:
- Klik kanan folder `storage/` → Change Permissions → 775
- Klik kanan folder `bootstrap/cache/` → Change Permissions → 775

### 5. Buat Storage Link

Jalankan command berikut via SSH atau Terminal di cPanel:

```bash
php artisan storage:link
```

Jika tidak bisa via SSH, buat symlink manual:
- Di cPanel File Manager, buat symlink dari `public/storage` ke `../storage/app/public`

**Atau buat folder manual:**
- Buat folder `public/storage/` (di `public_html/storage/`)
- Copy semua isi dari `storage/app/public/` ke `public/storage/`

### 6. Set Owner Folder

Pastikan owner folder adalah user cPanel Anda:

```bash
chown -R username:username /home/username/laravel
chown -R username:username /home/username/public_html
```

### 7. Install Dependencies (jika belum)

```bash
composer install --optimize-autoloader --no-dev
```

### 8. Optimize Laravel untuk Production

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 9. Jalankan Migration

```bash
php artisan migrate --force
```

### 10. Cek `.htaccess` di `public/`

Pastikan file `public/.htaccess` sudah ada dan benar (sudah ada di project).

## Checklist Sebelum Go Live

- [ ] File `.env` sudah dibuat dan dikonfigurasi
- [ ] `APP_KEY` sudah di-generate
- [ ] `APP_DEBUG=false` untuk production
- [ ] Database connection sudah benar
- [ ] Permission folder `storage/` dan `bootstrap/cache/` sudah 775
- [ ] Storage link sudah dibuat (`php artisan storage:link`)
- [ ] Migration sudah dijalankan
- [ ] Cache sudah dioptimize (`config:cache`, `route:cache`, `view:cache`)
- [ ] File `.htaccess` di root sudah ada (untuk keamanan)
- [ ] Test semua fitur website

## Troubleshooting

### Error 500 Internal Server Error
- Cek error log di `storage/logs/laravel.log`
- Pastikan permission folder sudah benar
- Pastikan `APP_KEY` sudah di-set
- Cek `.htaccess` tidak ada konflik

### Storage link tidak bekerja
- Pastikan symlink sudah dibuat: `php artisan storage:link`
- Atau copy manual isi `storage/app/public/` ke `public/storage/`

### Permission Denied
- Set permission 775 untuk `storage/` dan `bootstrap/cache/`
- Pastikan owner adalah user cPanel Anda

### Database Connection Error
- Cek kredensial database di `.env`
- Pastikan database sudah dibuat di cPanel
- Cek `DB_HOST` (biasanya `localhost` untuk shared hosting)

## Catatan Penting

1. **Jangan upload folder `.git/`** ke production
2. **Jangan upload file `.env`** dari local (buat baru di server)
3. **Pastikan `APP_DEBUG=false`** di production
4. **Backup database** sebelum migration
5. **Test di staging** dulu jika memungkinkan
