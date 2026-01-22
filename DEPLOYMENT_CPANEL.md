# Panduan Deployment Laravel ke cPanel Shared Hosting

## 📋 Persiapan Sebelum Upload

### 1. Build Assets untuk Production

Jalankan command berikut di local:

```bash
npm run build
```

Ini akan membuat file CSS dan JS yang sudah dioptimize di folder `public/build/`.

### 2. Install Dependencies Production

```bash
composer install --optimize-autoloader --no-dev
```

### 3. File yang Perlu Diupload

**✅ Upload file-file berikut:**
- `app/` (seluruh folder)
- `bootstrap/` (seluruh folder)
- `config/` (seluruh folder)
- `database/` (seluruh folder)
- `resources/` (seluruh folder)
- `routes/` (seluruh folder)
- `storage/` (seluruh folder)
- `vendor/` (seluruh folder - dari `composer install`)
- `public/` (seluruh isi folder)
- `artisan`
- `composer.json`
- `composer.lock`
- `.htaccess` (file di root project)
- `.env` (buat baru di server, jangan upload dari local)

**❌ JANGAN upload:**
- `.git/`
- `.env` (dari local - buat baru di server)
- `node_modules/`
- `.vscode/`, `.idea/`, `.fleet/`
- `tests/` (opsional, bisa diupload tapi tidak wajib)
- `phpunit.xml` (opsional)

## 🗂️ Struktur Folder di cPanel

### Opsi 1: Root Domain = public_html (Recommended)

Jika domain utama diarahkan ke `public_html/`, struktur di server:

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
├── .htaccess
├── artisan
├── composer.json
└── composer.lock

/home/username/public_html/  (atau /public_html/)
├── index.php
├── .htaccess
├── assets/
├── build/
├── storage/ (symlink)
└── ... (file lainnya dari public/)
```

**Cara setup:**
1. Upload semua file Laravel (kecuali `public/`) ke `/home/username/`
2. Upload semua isi folder `public/` ke `/home/username/public_html/`
3. Edit `public_html/index.php` untuk menyesuaikan path (lihat bagian di bawah)

### Opsi 2: Subdomain atau Subfolder

Jika menggunakan subdomain atau subfolder:

```
/home/username/public_html/subfolder/
├── app/
├── bootstrap/
├── config/
├── database/
├── resources/
├── routes/
├── storage/
├── vendor/
├── public/
│   ├── index.php
│   ├── .htaccess
│   └── ...
├── .env
├── .htaccess
├── artisan
└── composer.json
```

## 🔧 Konfigurasi File

### 1. Edit `public/index.php` (jika perlu)

Jika file Laravel berada di satu level di atas `public_html`, edit `public_html/index.php`:

```php
<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
```

### 2. Buat File `.env` di Server

Buat file `.env` di root Laravel dengan konfigurasi:

```env
APP_NAME="Alkes Lab"
APP_ENV=production
APP_KEY=
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

MAIL_MAILER=smtp
MAIL_HOST=smtp.yourdomain.com
MAIL_PORT=587
MAIL_USERNAME=your_email@yourdomain.com
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@yourdomain.com"
MAIL_FROM_NAME="${APP_NAME}"
```

**Generate APP_KEY:**
Via SSH atau Terminal di cPanel:
```bash
php artisan key:generate
```

Atau via cPanel File Manager:
1. Buka file `.env`
2. Tambahkan baris: `APP_KEY=base64:YOUR_KEY_HERE`
3. Generate key di local: `php artisan key:generate --show`
4. Copy key yang dihasilkan ke `.env` di server

## 🔐 Set Permission Folder

Set permission untuk folder `storage/` dan `bootstrap/cache/`:

**Via SSH:**
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

**Via cPanel File Manager:**
1. Klik kanan folder `storage/` → Change Permissions
2. Set ke: `775` (Owner: Read/Write/Execute, Group: Read/Write/Execute, Public: Read/Execute)
3. Centang "Recurse into subdirectories"
4. Ulangi untuk folder `bootstrap/cache/`

## 🔗 Buat Storage Link

**Via SSH:**
```bash
php artisan storage:link
```

**Via cPanel File Manager (Manual):**
1. Buka folder `public/` (atau `public_html/`)
2. Buat folder baru: `storage`
3. Copy semua isi dari `storage/app/public/` ke `public/storage/`

## 🚀 Optimize Laravel untuk Production

Jalankan command berikut via SSH:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 📊 Jalankan Migration

```bash
php artisan migrate --force
```

**⚠️ PENTING:** Backup database terlebih dahulu sebelum migration!

## ✅ Checklist Deployment

- [ ] File `.env` sudah dibuat dan dikonfigurasi
- [ ] `APP_KEY` sudah di-generate
- [ ] `APP_DEBUG=false` untuk production
- [ ] `APP_URL` sudah diset ke domain yang benar
- [ ] Database connection sudah benar
- [ ] Permission folder `storage/` dan `bootstrap/cache/` sudah 775
- [ ] Storage link sudah dibuat (`php artisan storage:link`)
- [ ] Migration sudah dijalankan
- [ ] Cache sudah dioptimize (`config:cache`, `route:cache`, `view:cache`)
- [ ] File `.htaccess` di root sudah ada (untuk keamanan)
- [ ] Assets sudah di-build (`npm run build`)
- [ ] Test semua fitur website

## 🐛 Troubleshooting

### Error 500 Internal Server Error

1. **Cek error log:**
   - Via cPanel: Error Log atau
   - File: `storage/logs/laravel.log`

2. **Cek permission:**
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

3. **Cek APP_KEY:**
   ```bash
   php artisan key:generate
   ```

4. **Clear cache:**
   ```bash
   php artisan config:clear
   php artisan route:clear
   php artisan view:clear
   ```

### Storage link tidak bekerja

**Solusi 1: Via SSH**
```bash
php artisan storage:link
```

**Solusi 2: Manual**
- Copy semua isi dari `storage/app/public/` ke `public/storage/`

### Permission Denied

```bash
chmod -R 775 storage bootstrap/cache
chown -R username:username storage bootstrap/cache
```

### Database Connection Error

1. Cek kredensial database di `.env`
2. Pastikan database sudah dibuat di cPanel
3. Cek `DB_HOST` (biasanya `localhost` untuk shared hosting)
4. Pastikan user database memiliki akses ke database

### CSS/JS tidak muncul

1. Pastikan sudah menjalankan `npm run build`
2. Pastikan folder `public/build/` sudah diupload
3. Cek path asset di browser console
4. Pastikan permission folder `public/build/` adalah 755

### Route tidak bekerja

1. Pastikan `.htaccess` di `public/` sudah ada
2. Cek `mod_rewrite` sudah enabled di cPanel
3. Jalankan: `php artisan route:clear` lalu `php artisan route:cache`

## 📝 Catatan Penting

1. **Jangan upload folder `.git/`** ke production
2. **Jangan upload file `.env`** dari local (buat baru di server)
3. **Pastikan `APP_DEBUG=false`** di production
4. **Backup database** sebelum migration
5. **Test di staging** dulu jika memungkinkan
6. **Gunakan HTTPS** untuk production (SSL certificate)
7. **Set `APP_URL`** ke domain yang benar dengan protocol HTTPS

## 🔄 Update Aplikasi

Saat ada update, ikuti langkah berikut:

1. Backup database
2. Upload file yang berubah
3. Via SSH:
   ```bash
   composer install --optimize-autoloader --no-dev
   php artisan migrate --force
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```
4. Test aplikasi

## 📞 Support

Jika mengalami masalah, cek:
- Error log: `storage/logs/laravel.log`
- cPanel Error Log
- Browser Console (F12)
