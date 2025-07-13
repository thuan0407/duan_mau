<?php
$currentPage = $_GET['action'] ?? 'trangchu';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        nav{
            display:flex;
            justify-content: space-between;
            align-items: center;
            margin:10px 20px;
        }
        .left{
            display:flex;
            margin:10px 0;
            align-items: center;
        }.left img{
            width:200px;
        }
.menu a {
    color: black;
    text-decoration: none;
    padding: 8px 12px;
    font-weight: normal;
}

.menu a.active {
    color: red;
    font-weight: bold;
}
        .right{
            display:flex;
        }
        .gioihang{
            margin-right:20px;
        }
    </style>
</head>
<body>
    <div class="top" style="width:1200px; height:50px; background-color:orange  ;"></div>

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