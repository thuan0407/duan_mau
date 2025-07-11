<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Xử lý đăng xuất
if (isset($_GET['action']) && $_GET['action'] === 'dangxuat') {
    session_destroy();
    header("Location: ?action=dangxuat");
    exit;
}

$page = $_GET['page'] ?? 'dashboard'; // Mặc định trang dashboard
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .menu{
            position: fixed;
            margin:0px 0px;
            width: 250px;
            background-color:pink;
            height:700px;
        }
        li{
            margin:30px 10px;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="menu">
 <h2>Chào mừng admin: <?= $_SESSION['admin']?>
        <li><a href="?action=<?='quanly_sanpham'?>">Trang chủ</a></li>
        <li><a href="?action=<?='quanly_danhmuc'?>">Quản lý danh mục</a></li>
        <li><a href="?action=<?='quanly_sanpham'?>">Quản lý sản phẩm</a></li>
        <li><a href="?action=<?='quanly_binhluan'?>">Quản lý bình luận</a></li>
        <li><a href="?action=<?='quanly_taikhoan'?>">Quản lý tài khoản</a></li>
        <li><a href="?action=<?='quanly_donhang'?>">Quản lý đơn hàng</a></li>
        <li><a href="?action=<?='dangxuat'?>" name="dangxuat" onclick="return confirm('Bạn có chắc là muốn đăng xuất không?')">Đăng xuất</a></li>
        
    </div>
</body>
</html>
