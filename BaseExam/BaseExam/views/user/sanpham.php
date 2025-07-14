<?php require_once 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin:0 auto;
        }
        .boloc{
            text-align: right;
            margin:50px;
        }
        .content{
            width:1000px;
            display: grid;
            grid-template-columns: repeat(4,1fr);
            text-align: center;
            gap:20px;
            margin:50px;
        }
        .item{
            max-width:100%;
            padding:50px 30px;
            border:1px solid black;
            padding-bottom:0;
        }
        .item:hover{
            background-color:antiquewhite;
        }
        .item img{
            width:80%;
            height:230px;
        }
        .chiadoi{
            display:flex;
            justify-content: center;
            align-items: center;
            
        }
        .mua{
            color:white;
            border:1px solid black;
            background-color:red;
            width:100px;
            height:30px;
            display:flex;
            text-align: center;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            margin:0;
            font-weight: bold;
        }
        .ten_sp, .gia_sp, .a, .thêm{
            font-weight: bold;
        }
        
    </style>
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
            <a href="#" style="color:red;">>>Xem chi tiết</a>
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