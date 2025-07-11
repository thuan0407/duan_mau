<?php ?>
<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    <style>
        body{
            margin:0 auto;
            width: 1200px;
        }
        .top{
            width:1200px;
            background-color:orange;
            height:50px;
        }
        .dangnhap{
            border:1px solid black;
            padding:50px;
            width:400px;
            margin:100px 400px;
            box-shadow: 10px 10px 10px 10px rgb(248, 198, 104);

        }
        .top img{
            width:200px;
        }
        h2{
            text-align: center;
        }
        button {
            margin-left:150px;
        }
        a{
            margin:10px 155px;
        } table{
            margin-left:50px;
        }

    </style>
</head>
<body>
    <div class="top"><img src="./img/OIP.jpg" alt=""></div>
    <div class="dangnhap">
    <h2>Đăng ký</h2>



    <form method="POST">
    <table>
        <tr>
            <td>Tên:</td>
            <td><input type="text" name="name"></td>
        </tr>

        <tr>
            <td>email:</td>
            <td><input type="email" name="email" required placeholder="Nhập email"></td>
        </tr>

        <tr>
            <td>Mật khẩu:</td>
            <td><input type="password" name="password" required placeholder="Nhập mật khẩu"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" name="address"></td>
        </tr>
        <tr>
            <td>SDT:</td>
            <td><input type="number" min="10" name="number"></td>
        </tr>
        
    </table><br>

        <button type="submit" name="dangky">Đăng ký</button>
           <span style="color:red;"> <?= $loi?></span>
           <span style="color:green;"> <?= $thanhcong?></span>
    </form>

    <a href="?action=dangnhap">Đăng nhập</a>
     </div>
</body>
</html>
