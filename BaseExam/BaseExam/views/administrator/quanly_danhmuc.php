<?php require_once 'giaodien.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin:0 auto;
            width:1200px;
        }
        .content{
            margin-left:300px;  
        }h1{
            margin:0px;
        }
        table{
            border-collapse:collapse;
            margin:100px;
        }
        th,td{
            border-bottom:1px solid black;
            padding:15px 30px;
        }
    </style>
    
</head>
<body>
    <div class="content">
        <?php $thongbao=""; ?>
        <!-- khởi tạo biến thông báo tránh lỗi vì đang làm hai câu lệnh trên cùng một file -->
        
    <h1>Trang quản lý danh mục</h1>
        <form action=""method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>Tên danh mục</th>
                    <td><input type="text" name="name_danhmuc">
            <button tpye="submit" name="create">Tạo</button>
            <span><?=$thanhcong?></span>
             <span><?=$loi?></span>
             </td></tr>
            </table>
        </form>

    <table>
        <span><?=$thongbao?></span>
        <tr>
            <th>Tên danh mục</th>
            <th>Số lượng</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>

        </tr>
        <?php
        foreach($danhsach as $tt){
            ?>
            <tr>
                <td><?=$tt->name?></td>
                <td><?=$tt->sum?></td>
                <td><?=$tt->date?></td>
                <td>
                <a href="?action=delete_danhmuc&id=<?=$tt->id?>" onclick="return confirm('Bạn có chắc là muốn xóa không?')">Xóa</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    </div>
</body>
</html>