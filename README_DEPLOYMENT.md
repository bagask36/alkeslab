# 📦 Deployment ke cPanel Shared Hosting

## 🎯 Quick Start

### 1. Persiapan File (Jalankan di Local)

```bash
# Buat file siap deploy
./prepare-deployment.sh
```

Script ini akan:
- ✅ Build assets production (`npm run build`)
- ✅ Install composer dependencies production
- ✅ Membuat file informasi deployment

### 2. Upload ke cPanel

Ikuti panduan di **`FILES_TO_UPLOAD.txt`** untuk file yang perlu diupload.

### 3. Setup di Server

**Via SSH (Recommended):**
```bash
./deploy.sh
```

**Atau manual:**
```bash
php artisan key:generate
chmod -R 775 storage bootstrap/cache
php artisan storage:link
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 📚 Dokumentasi

- **`CPANEL_SETUP.md`** - Quick setup guide (5 menit)
- **`DEPLOYMENT_CPANEL.md`** - Panduan lengkap deployment
- **`FILES_TO_UPLOAD.txt`** - Daftar file yang perlu diupload
- **`.env.production.example`** - Template file .env untuk production

## ⚠️ Penting

1. **Jangan upload `.env` dari local** - Buat baru di server
2. **Set `APP_DEBUG=false`** di production
3. **Generate `APP_KEY`** di server (jangan copy dari local)
4. **Backup database** sebelum migration
5. **Test semua fitur** setelah deployment

## 🆘 Bantuan

Jika ada masalah, cek:
- Error log: `storage/logs/laravel.log`
- cPanel Error Log
- Browser Console (F12)

Lihat **`DEPLOYMENT_CPANEL.md`** bagian Troubleshooting untuk solusi masalah umum.
