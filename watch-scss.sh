#!/bin/bash

# Color codes
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

echo -e "${GREEN}SCSS監視スクリプトを開始します...${NC}"
echo -e "${YELLOW}SCSSファイルが変更されると自動的にCSSにコンパイルされます。${NC}"
echo "終了するには Ctrl+C を押してください。"

# If sass is installed globally
if command -v sass &> /dev/null; then
    sass --watch styles.scss:styles.css
# Otherwise use npx
else
    npx sass --watch styles.scss:styles.css
fi
