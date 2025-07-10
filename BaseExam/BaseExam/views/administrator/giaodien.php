<?php
// Kiểm tra đã đăng nhập chưa
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../chung/login.php");
    exit;
}
?>

<h2>Chào mừng admin: <?= $_SESSION['admin']?>
<a href="?action=<?='dangxuat'?>">Đăng xuất</a>
