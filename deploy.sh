#!/bin/bash

# Laravel Deployment Script untuk cPanel Shared Hosting
# Pastikan Anda sudah menjalankan: chmod +x deploy.sh

echo "=========================================="
echo "Laravel Deployment Script"
echo "=========================================="
echo ""

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Check if .env exists
if [ ! -f .env ]; then
    echo -e "${RED}Error: File .env tidak ditemukan!${NC}"
    echo "Silakan copy .env.example ke .env dan konfigurasi terlebih dahulu."
    exit 1
fi

echo -e "${YELLOW}1. Installing Composer dependencies...${NC}"
composer install --optimize-autoloader --no-dev --no-interaction

if [ $? -ne 0 ]; then
    echo -e "${RED}Error: Composer install gagal!${NC}"
    exit 1
fi

echo -e "${GREEN}✓ Composer dependencies installed${NC}"
echo ""

echo -e "${YELLOW}2. Generating application key...${NC}"
php artisan key:generate --force

echo -e "${GREEN}✓ Application key generated${NC}"
echo ""

echo -e "${YELLOW}3. Creating storage link...${NC}"
php artisan storage:link

echo -e "${GREEN}✓ Storage link created${NC}"
echo ""

echo -e "${YELLOW}4. Setting permissions...${NC}"
chmod -R 775 storage
chmod -R 775 bootstrap/cache

echo -e "${GREEN}✓ Permissions set${NC}"
echo ""

echo -e "${YELLOW}5. Running migrations...${NC}"
php artisan migrate --force

if [ $? -ne 0 ]; then
    echo -e "${RED}Error: Migration gagal!${NC}"
    exit 1
fi

echo -e "${GREEN}✓ Migrations completed${NC}"
echo ""

echo -e "${YELLOW}6. Optimizing for production...${NC}"
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo -e "${GREEN}✓ Application optimized${NC}"
echo ""

echo -e "${GREEN}=========================================="
echo "Deployment completed successfully!"
echo "==========================================${NC}"
