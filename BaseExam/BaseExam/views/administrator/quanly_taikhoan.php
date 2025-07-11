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
        form{
            margin:50px ;
            text-align: right;
        }
        table{
            border-collapse:collapse;
            
        }
        th, td{
            padding:15px 20px;
            border-bottom:1px solid black;
        }
    </style>
    
</head>
<body>
    <div class="content">
    <h1>Trang quản lý tài khoản</h1>
            <form action=""method="post">
            Search <input type="text" name="tim_user">
        </form>
    <table>
        <tr>
            <th>Tên </th>
            <th>email</th>
            <th>Điện thoại</th>
            <th>role</th>
            <th>Hành động</th>
        </tr>
        <?php
        foreach($danhsach as $tt){
            ?>
            <tr>
                <td><?=$tt->name?></td>
                <td><?=$tt->email?></td>
                <td><?=$tt->number?></td>
                <td><?=$tt->role?></td>
                <td>
                    <a href="">Xem chi tiết / </a>
                    <a href="">Khóa</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    </div>
</body>
</html>