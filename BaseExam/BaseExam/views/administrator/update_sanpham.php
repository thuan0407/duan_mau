<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Trang update sản phẩm</h1>
<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <th>Tên sản phẩm</th>
            <td><input type="text" name="name" value="<?=$sanpham->name?>"></td>
        </tr>
        <tr>
            <th>ảnh</th>
            <td><input type="file" name="anh_sp" value="<?=$sanpham->image?>"><br>
            <img src="<?= BASE_ASSETS_UPLOADS .$sanpham->image?>" alt="" width=100>
        </td>
        </tr>
        <tr>
            <th>loại</th>
            <td>
                <select name="idcategory" id="">
                    <option value="">chọn danh mục</option>
                    <?php
                    foreach($danhsach as $tt){
                        ?>
                    <option value="<?=$tt->id?>"><?=$tt->name?></option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>hot</th>
            <td><input type="number" name="hot" value="<?=$sanpham->hot?>"></td>
        </tr>
        <tr>
            <th>giấ</th>
            <td><input type="number" name="price" value="<?=$sanpham->price?>"></td>
        </tr>
        <tr>
            <th>giảm giá</th>
            <td><input type="number" name="discount" value="<?=$sanpham->discount?>"></td>
        </tr>
        <tr>
            <th>Miêu tả</th>
            <td><input type="text" name="description" value="<?=$sanpham->description?>"></td>
        </tr>
        <tr>
            <th>Số lượng</th>
            <td><input type="number" name="quantity" value="<?=$sanpham->quantity?>"></td>
        </tr>

    </table>
    <button type="submit" name="update_sanpham">update</button>
    <a href="?action=<?='quanly_sanpham'?>">quay lại</a>
    <span><?= $loi?></span>
    <span><?= $thanhcong?></span>
</form>
</body>
</html>