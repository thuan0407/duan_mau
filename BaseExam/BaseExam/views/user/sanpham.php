<?php require_once 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/user/sanpham.css">
</head>
<body>
<h1>Trang sản phẩm</h1>
<div class="boloc">
    <button>lọc</button> 
    <select name="" id="">
        <option value=""><--chọn nd--></option>
        <option value="">A->Z</option>
        <option value="">Z->A</option>
    </select>
</div>
<div class="content">
    <?php
        foreach($danhsach as $tt){
            ?>
    <div class="item">
            
            <img src="<?=BASE_ASSETS_UPLOADS .$tt->image?>" alt=""><br>
            <span class="ten_sp" style="font-size:20px;"><?=$tt->name?></span> <br>
            <span class="gia_sp"><?=$tt->price?>đ</span> <br>
            <a href="?action=chi_tiet_sp&id=<?=$tt->id?>" style="color:red;">>>Xem chi tiết</a>
            <div class="chiadoi">
                <a href="#" class="mua">Mua</a>
                <p class="thêm">Thêm vào giỏi hàng</p> <br>
            </div>
    </div>
                <?php
        }
        ?>
</div>
</body>
</html>
<?php
require_once 'footer.php';
?>