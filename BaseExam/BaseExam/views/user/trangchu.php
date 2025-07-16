    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

$action = $_GET['action'] ?? 'hot1';
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trang chủ sản phẩm</title>
        <style>
            * {
                box-sizing: border-box;
            }
            .banner {
            position: relative;
            width: 100%;
            height: 300px;
            overflow: hidden;
            }

            .banner img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease-in-out;
            }
            .menu{
                padding-top:30px;
            }
            main .menu a{
                font-size:20px;
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
            .active{
                color:red;
            }
            .menu a:hover{
                color:red;
            }


        </style>
    </head>
    <body onload="start()">

        <?php require_once 'header.php'; ?>

        <!-- Banner slideshow -->
        <div class="banner">
            <img id="anh_banner" src="./img/banner0.jpg" alt="Banner slideshow">
        </div>

        <main>
<div class="menu">
    <a href="?action=hot1" class="<?= $action === 'hot1' ? 'active' : '' ?>">SẢN PHẨM HOT</a>
    <a href="?action=hot2" class="<?= $action === 'hot2' ? 'active' : '' ?>">SẢN PHẨM MỚI</a>
    <a href="?action=khuyenmai" class="<?= $action === 'khuyenmai' ? 'active' : '' ?>">SẢN PHẨM KHUYẾN MÃI</a>
</div>
        

        <div class="content">
        <?php
    switch($action){
        case 'hot1': 
        foreach($danhsach_hot1 as $tt){
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
            break;
        case 'hot2':
        foreach($danhsach_hot2 as $tt){
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
            break;
        case 'khuyenmai':
        foreach($danhsach_khuyenmai as $tt){
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
            break;
         default: 
        foreach($danhsach_hot1 as $tt){
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
            break;  
    }
        ?>
        </div>


        </main>

        <?php require_once 'footer.php'; ?>

    <script>
    window.onload = function () {
        const anh_banner = document.getElementById('anh_banner');
        let index = 0;
        const arr = [];

        // Load ảnh trước
        for (let i = 0; i < 5; i++) {
        arr[i] = './img/banner' + i + '.jpg';
        }

        function slideIn(newSrc) {
        // Tạo ảnh mới nằm bên phải
        const img = document.createElement('img');
        img.src = newSrc;
        img.style.position = 'absolute';
        img.style.top = 0;
        img.style.left = '100%';
        img.style.width = '100%';
        img.style.height = '100%';
        img.style.objectFit = 'cover';
        img.style.transition = 'left 0.6s ease-in-out';

        const banner = document.querySelector('.banner');
        banner.appendChild(img);

        // Kéo ảnh hiện tại sang trái, ảnh mới trượt vào
        setTimeout(() => {
            img.style.left = '0';
            anh_banner.style.left = '-100%';
        }, 10);

        // Sau khi xong hiệu ứng, xóa ảnh cũ và thay ID
        setTimeout(() => {
            banner.removeChild(anh_banner);
            img.id = 'anh_banner';
        }, 700);
        }

        function start() {
        index = (index + 1) % arr.length;
        slideIn(arr[index]);
        setTimeout(start, 3000);
        }

        start();
    };
    </script>

    </body>
    </html>
