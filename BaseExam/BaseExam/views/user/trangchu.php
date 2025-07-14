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
        .danhmuc {
            border: 1px solid black;
            margin: 20px;
            padding: 20px;
            width: 200px;
            /* Xoá height cố định để tự giãn */
        }
        .danhmuc ul {
            padding-left: 0;
        }
        .danhmuc li {
            list-style: none;
            margin-top: 10px;
        }
        .danhmuc li a {
            text-decoration: none;
            color: black;
        }
        .danhmuc li a:hover {
            color: red;
        }
        main {
            display: flex;
        }
        .sanpham {
            width: 1000px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            text-align: center;
            gap: 20px;
            margin: 50px;
        }
        .item img {
            width: 80%;
            height: 250px;
            object-fit: cover;
        }
        .chiadoi {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .mua {
            color: white;
            border: 1px solid black;
            background-color: red;
            width: 100px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            font-weight: bold;
        }
        .ten_sp, .gia_sp, .thêm {
            font-weight: bold;
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
        <!-- Danh mục -->
        <div class="danhmuc">
            <h3>Danh mục:</h3>
            <ul>
                <?php if (!empty($danhsach)): ?>
                    <?php foreach($danhsach as $tt): ?>
                        <li><a href="?action=danhmuc&id=<?= $tt->id ?>"><?= $tt->name ?></a></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>

        <!-- Sản phẩm -->
        <div class="content">
            <!-- HOT -->
            <h1>Sản phẩm hot</h1>
            <div class="sanpham">
                <?php if (!empty($danhsach_sp1)): ?>
                    <?php foreach($danhsach_sp1 as $tt): ?>
                        <div class="item">
                            <img src="<?= BASE_ASSETS_UPLOADS . $tt->image ?>" alt="">
                            <span class="ten_sp"><?= $tt->name ?></span><br>
                            <span class="gia_sp"><?= $tt->price ?>đ</span><br>
                            <a href="#" style="color:red;">>> Xem chi tiết</a>
                            <div class="chiadoi">
                                <a href="#" class="mua">Mua</a>
                                <p class="thêm">Thêm vào giỏ hàng</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- MỚI -->
            <h1>Sản phẩm mới</h1>
            <div class="sanpham">
                <?php if (!empty($danhsach_sp2)): ?>
                    <?php foreach($danhsach_sp2 as $tt): ?>
                        <div class="item">
                            <img src="<?= BASE_ASSETS_UPLOADS . $tt->image ?>" alt="">
                            <span class="ten_sp"><?= $tt->name ?></span><br>
                            <span class="gia_sp"><?= $tt->price ?>đ</span><br>
                            <a href="#" style="color:red;">>> Xem chi tiết</a>
                            <div class="chiadoi">
                                <a href="#" class="mua">Mua</a>
                                <p class="thêm">Thêm vào giỏ hàng</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- KHUYẾN MÃI (tạm để trống) -->
            <h1>Sản phẩm khuyến mãi</h1>
            <div class="sanpham">
                <!-- Bạn có thể đổ dữ liệu ở đây sau -->
            </div>
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
