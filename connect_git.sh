#!/bin/bash

# Di chuyển đến thư mục dự án
cd /Applications/XAMPP/xamppfiles/htdocs/tunganh/test

# Kiểm tra xem đã là git repository chưa
if [ ! -d ".git" ]; then
    echo "Đang khởi tạo git repository..."
    git init
fi

# Thêm remote origin nếu chưa có
if ! git remote | grep -q "origin"; then
    echo "Đang thêm remote origin..."
    git remote add origin https://github.com/thuan0407/duan_mau.git
else
    echo "Đang cập nhật remote origin..."
    git remote set-url origin https://github.com/thuan0407/duan_mau.git
fi

# Hiển thị thông tin remote
echo ""
echo "Kết nối git đã được thiết lập:"
git remote -v

# Fetch từ remote
echo ""
echo "Đang lấy thông tin từ remote..."
git fetch origin

echo ""
echo "Hoàn tất! Bạn có thể sử dụng các lệnh git như:"
echo "  git pull origin main    - Lấy code từ remote"
echo "  git push origin main    - Đẩy code lên remote"
echo "  git status              - Xem trạng thái"

