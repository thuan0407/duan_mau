<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user'])) {
    $nameUser = $_SESSION['user'];
}
else{
    $nameUser ="";
}
$currentPage = $_GET['action'] ?? 'trangchu';

if (isset($_SESSION['iduser'])) {
    $idUser = $_SESSION['iduser'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/user/header.css">
</head>
<body>
    <div class="top" style="width:1200px; height:50px; background-color:orange  ;">
      <h2><?=$nameUser?></h2>
      <!-- <h2> id=<?= $idUser?></h2> -->
      <form action="" method="post">
        <?php if(!empty($_SESSION['user'])): ?>
            <button type="submit" name="logout">Đăng xuất</button>
            <?php else :?>
            <a href="?action=dangnhap">Đăng nhập</a>
                <?php endif;
            ?>
      </form>
    </div>
    <nav>
        <div class="left">
            <img src="./img/OIP.jpg" alt="">
            
            <div class="menu">
                <a href="?action=trangchu"  class="<?= $currentPage == 'trangchu'  ? 'active' : '' ?>">Trang chủ</a>
                <a href="?action=gioithieu" class="<?= $currentPage == 'gioithieu' ? 'active' : '' ?>">Giới Thiệu</a>
                <a href="?action=sanpham"   class="<?= $currentPage == 'sanpham'   ? 'active' : '' ?>">Sản phẩm</a>
                <a href="?action=lienhe"    class="<?= $currentPage == 'lienhe'    ? 'active' : '' ?>">Liên hệ</a>
            </div>

        </div>
        <div class="right">
            <div class="gioihang">🛒 </div>
            <form action="">
                <input type="text" placeholder="search">
                <button type="submit" name="tim">Tìm kiếm</button>
            </form>
        </div>
    </nav>
    
    
</body>
</html>
<?php
?>