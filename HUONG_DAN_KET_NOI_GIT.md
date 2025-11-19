# Hướng Dẫn Kết Nối Dự Án Đến GitHub Lần Đầu

## Cách 1: Kết nối dự án mới (chưa có git) với GitHub

### Bước 1: Tạo repository trên GitHub

1. Đăng nhập vào GitHub
2. Click nút **"New"** hoặc **"+"** → **"New repository"**
3. Đặt tên repository (ví dụ: `duan_mau`)
4. Chọn **Public** hoặc **Private**
5. **KHÔNG** tích vào "Initialize this repository with a README"
6. Click **"Create repository"**

### Bước 2: Khởi tạo Git trong dự án local

```bash
# Di chuyển vào thư mục dự án
cd /Applications/XAMPP/xamppfiles/htdocs/tunganh/test

# Khởi tạo git repository
git init

# Thêm tất cả file vào staging
git add .

# Commit lần đầu
git commit -m "Initial commit"

# Thêm remote origin (thay URL bằng URL repository của bạn)
git remote add origin https://github.com/thuan0407/duan_mau.git

# Kiểm tra remote đã được thêm chưa
git remote -v

# Push code lên GitHub (nhánh main)
git branch -M main
git push -u origin main
```

## Cách 2: Clone repository từ GitHub về máy

```bash
# Clone repository về máy
git clone https://github.com/thuan0407/duan_mau.git

# Di chuyển vào thư mục vừa clone
cd duan_mau
```

## Cách 3: Kết nối dự án đã có với GitHub mới

```bash
# Di chuyển vào thư mục dự án
cd /Applications/XAMPP/xamppfiles/htdocs/tunganh/test

# Khởi tạo git (nếu chưa có)
git init

# Thêm remote origin
git remote add origin https://github.com/thuan0407/duan_mau.git

# Hoặc nếu đã có remote, cập nhật URL
git remote set-url origin https://github.com/thuan0407/duan_mau.git

# Thêm file và commit
git add .
git commit -m "Initial commit"

# Push lên GitHub
git push -u origin main
```

## Các lệnh Git cơ bản thường dùng

```bash
# Xem trạng thái
git status

# Xem các nhánh
git branch -a

# Xem remote
git remote -v

# Lấy code từ GitHub
git pull origin main

# Đẩy code lên GitHub
git push origin main

# Tạo nhánh mới
git checkout -b ten-nhanh-moi

# Chuyển nhánh
git checkout ten-nhanh
```

## Lưu ý quan trọng

1. **Lần đầu push**: Phải dùng `git push -u origin main` để thiết lập tracking
2. **Xác thực**: GitHub có thể yêu cầu username/password hoặc Personal Access Token
3. **Nhánh mặc định**: GitHub hiện dùng `main` thay vì `master`
4. **File .gitignore**: Nên tạo file `.gitignore` để loại trừ file không cần thiết
