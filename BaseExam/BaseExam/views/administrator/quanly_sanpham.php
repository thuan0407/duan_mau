<?php require_once 'giaodien.php'; ?>
<a href="#">thêm sản phẩm</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            width:1200px;
        }
        .content{
            margin-left:300px;
        }
        .right{
            text-align: right;
        }
        table {
            border-collapse: separate;
            border-spacing: 0 12px; /* tạo khoảng cách dọc giữa các <tr> */
            width: 100%;
        }

        th, td {
            padding: 10px 15px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Sản phẩm</h1>
        <div class="right">
            <a href="?action=create_sanpham">Thêm sản phẩm</a><br>
            Search <input type="text">
        </div>
        <table>
            <tr>
                <th>HÌnh ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Khuyến mãi</th>
                <th>Danh mục </th>
                <th>Hot</th>
                <th>Số lượng</th>
                <th>Hành động</th>
            </tr>
                <?php
                foreach($danhsach as $tt){
                    ?>
                    <tr>
                    <td>
                        <img src="<?= BASE_ASSETS_UPLOADS .$tt->image?>" alt="" width=100>
                    </td>
                    <td><?= $tt->name?></td>
                    <td><?= $tt->price?></td>
                    <td><?= $tt->discount?></td>
                    <td><?= $tt->idcategory?></td>
                    <td><?= $tt->hot?></td>
                    <td><?= $tt->quantity?></td>
                    <td>
                        <a href="?action=updeta_sanpham&id=<?=$tt->id?>">Sửa /</a>
                        <a href="?action=delete_sanpham&id=<?=$tt->id?>" onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này không?')">Xoá</a>
                    </td>
                    </tr>
                    <?php
                }
                ?>
        </table>
        </div>
</body>
</html>