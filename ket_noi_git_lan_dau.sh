#!/bin/bash

echo "=========================================="
echo "  KẾT NỐI DỰ ÁN ĐẾN GITHUB LẦN ĐẦU"
echo "=========================================="
echo ""

# Lấy đường dẫn thư mục hiện tại
PROJECT_DIR="/Applications/XAMPP/xamppfiles/htdocs/tunganh/test"
cd "$PROJECT_DIR"

echo "📁 Thư mục dự án: $PROJECT_DIR"
echo ""

# Kiểm tra xem đã là git repository chưa
if [ ! -d ".git" ]; then
    echo "🔧 Đang khởi tạo git repository..."
    git init
    echo "✅ Đã khởi tạo git repository"
else
    echo "ℹ️  Dự án đã có git repository"
fi

echo ""

# Nhập URL GitHub repository
echo "📝 Nhập URL GitHub repository của bạn:"
echo "   Ví dụ: https://github.com/thuan0407/duan_mau.git"
read -p "URL: " GITHUB_URL

if [ -z "$GITHUB_URL" ]; then
    echo "❌ URL không được để trống!"
    exit 1
fi

# Kiểm tra và thêm/cập nhật remote
if git remote | grep -q "origin"; then
    echo "🔄 Đang cập nhật remote origin..."
    git remote set-url origin "$GITHUB_URL"
    echo "✅ Đã cập nhật remote origin"
else
    echo "➕ Đang thêm remote origin..."
    git remote add origin "$GITHUB_URL"
    echo "✅ Đã thêm remote origin"
fi

echo ""
echo "📋 Thông tin remote:"
git remote -v

echo ""
echo "📦 Đang kiểm tra file chưa commit..."

# Kiểm tra có file chưa commit không
if [ -n "$(git status --porcelain)" ]; then
    echo "📝 Có file chưa được commit"
    read -p "Bạn có muốn thêm tất cả file và commit? (y/n): " ADD_FILES
    
    if [ "$ADD_FILES" = "y" ] || [ "$ADD_FILES" = "Y" ]; then
        git add .
        read -p "Nhập message cho commit: " COMMIT_MSG
        if [ -z "$COMMIT_MSG" ]; then
            COMMIT_MSG="Initial commit"
        fi
        git commit -m "$COMMIT_MSG"
        echo "✅ Đã commit file"
    fi
else
    echo "ℹ️  Tất cả file đã được commit"
fi

echo ""
echo "🌿 Đang kiểm tra nhánh hiện tại..."
CURRENT_BRANCH=$(git branch --show-current 2>/dev/null || echo "main")

if [ -z "$CURRENT_BRANCH" ]; then
    echo "📝 Chưa có commit nào, đang tạo nhánh main..."
    git checkout -b main 2>/dev/null || git branch -M main
    CURRENT_BRANCH="main"
fi

echo "📍 Nhánh hiện tại: $CURRENT_BRANCH"

echo ""
echo "🚀 Bạn có muốn push code lên GitHub không?"
echo "   (Lần đầu push cần dùng: git push -u origin $CURRENT_BRANCH)"
read -p "Push code lên GitHub? (y/n): " PUSH_CODE

if [ "$PUSH_CODE" = "y" ] || [ "$PUSH_CODE" = "Y" ]; then
    echo ""
    echo "📤 Đang push code lên GitHub..."
    git push -u origin "$CURRENT_BRANCH"
    
    if [ $? -eq 0 ]; then
        echo ""
        echo "✅ THÀNH CÔNG! Code đã được push lên GitHub"
        echo "🔗 Repository: $GITHUB_URL"
    else
        echo ""
        echo "❌ Có lỗi xảy ra khi push code"
        echo "💡 Kiểm tra lại:"
        echo "   - URL repository có đúng không?"
        echo "   - Bạn đã đăng nhập GitHub chưa?"
        echo "   - Có quyền truy cập repository không?"
    fi
else
    echo ""
    echo "ℹ️  Bạn có thể push code sau bằng lệnh:"
    echo "   git push -u origin $CURRENT_BRANCH"
fi

echo ""
echo "=========================================="
echo "  HOÀN TẤT!"
echo "=========================================="
echo ""
echo "📚 Các lệnh hữu ích:"
echo "   git status              - Xem trạng thái"
echo "   git pull origin $CURRENT_BRANCH  - Lấy code từ GitHub"
echo "   git push origin $CURRENT_BRANCH  - Đẩy code lên GitHub"
echo "   git branch -a           - Xem tất cả nhánh"
echo "   git remote -v           - Xem thông tin remote"
echo ""

