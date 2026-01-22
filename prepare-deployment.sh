#!/bin/bash

# Script untuk mempersiapkan file sebelum upload ke cPanel
# Jalankan: chmod +x prepare-deployment.sh && ./prepare-deployment.sh

echo "=========================================="
echo "Preparing files for cPanel deployment..."
echo "=========================================="
echo ""

# Colors
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Build assets
echo -e "${YELLOW}1. Building assets for production...${NC}"
npm run build

if [ $? -ne 0 ]; then
    echo "Error: npm build failed!"
    exit 1
fi

echo -e "${GREEN}✓ Assets built successfully${NC}"
echo ""

# Install production dependencies
echo -e "${YELLOW}2. Installing production dependencies...${NC}"
composer install --optimize-autoloader --no-dev --no-interaction

if [ $? -ne 0 ]; then
    echo "Error: Composer install failed!"
    exit 1
fi

echo -e "${GREEN}✓ Dependencies installed${NC}"
echo ""

# Create deployment package info
echo -e "${YELLOW}3. Creating deployment info...${NC}"
cat > DEPLOYMENT_INFO.txt << EOF
==========================================
DEPLOYMENT INFORMATION
==========================================
Date: $(date)
Laravel Version: $(php artisan --version)
Node Version: $(node --version)
NPM Version: $(npm --version)

Files prepared:
- Assets built: public/build/
- Vendor dependencies: vendor/
- Ready for upload

Next steps:
1. Upload files according to FILES_TO_UPLOAD.txt
2. Follow instructions in DEPLOYMENT_CPANEL.md
==========================================
EOF

echo -e "${GREEN}✓ Deployment info created${NC}"
echo ""

echo -e "${GREEN}=========================================="
echo "Preparation completed!"
echo "=========================================="
echo ""
echo "Next steps:"
echo "1. Review FILES_TO_UPLOAD.txt"
echo "2. Follow DEPLOYMENT_CPANEL.md"
echo "3. Upload files to cPanel"
echo ""
