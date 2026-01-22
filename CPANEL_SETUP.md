# 🚀 Quick Setup Guide untuk cPanel Shared Hosting

## ⚡ Quick Start (5 Menit)

### 1. Persiapan di Local

```bash
# Build assets
npm run build

# Install production dependencies
composer install --optimize-autoloader --no-dev
```

### 2. Upload File ke cPanel

**Via cPanel File Manager atau FTP:**

Upload file sesuai `FILES_TO_UPLOAD.txt`

**Struktur di server:**
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
├── .env (BUAT BARU)
├── .htaccess
└── artisan

/home/username/public_html/
├── index.php
├── .htaccess
├── build/
└── ... (isi folder public/)
```

### 3. Setup di cPanel

**Via SSH atau Terminal:**

```bash
# 1. Generate APP_KEY
php artisan key:generate

# 2. Set permissions
chmod -R 775 storage bootstrap/cache

# 3. Create storage link
php artisan storage:link

# 4. Run migrations
php artisan migrate --force

# 5. Optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

**Via cPanel File Manager (jika tidak ada SSH):**

1. **Buat .env:**
   - Copy `.env.example` ke `.env`
   - Edit dan isi konfigurasi database

2. **Generate APP_KEY:**
   - Buka Terminal di cPanel
   - Jalankan: `php artisan key:generate`

3. **Set Permission:**
   - Klik kanan `storage/` → Change Permissions → 775
   - Klik kanan `bootstrap/cache/` → Change Permissions → 775

4. **Storage Link:**
   - Buat folder `public_html/storage/`
   - Copy isi dari `storage/app/public/` ke `public_html/storage/`

## 📝 Konfigurasi .env

```env
APP_NAME="Alkes Lab"
APP_ENV=production
APP_KEY=base64:... (generate dengan: php artisan key:generate)
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

# ... (isi lainnya sesuai kebutuhan)
```

## ✅ Checklist

- [ ] Assets sudah di-build (`npm run build`)
- [ ] File sudah diupload ke server
- [ ] File `.env` sudah dibuat dan dikonfigurasi
- [ ] `APP_KEY` sudah di-generate
- [ ] Permission `storage/` dan `bootstrap/cache/` = 775
- [ ] Storage link sudah dibuat
- [ ] Migration sudah dijalankan
- [ ] Cache sudah dioptimize
- [ ] Website sudah bisa diakses

## 🆘 Masalah Umum

**Error 500:**
- Cek `storage/logs/laravel.log`
- Pastikan permission sudah benar
- Pastikan `APP_KEY` sudah di-set

**CSS/JS tidak muncul:**
- Pastikan folder `public/build/` sudah diupload
- Jalankan `npm run build` lagi

**Database error:**
- Cek kredensial di `.env`
- Pastikan database sudah dibuat di cPanel

## 📚 Dokumentasi Lengkap

Lihat `DEPLOYMENT_CPANEL.md` untuk panduan lengkap.
