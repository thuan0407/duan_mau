<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_POST['dangnhap'])){
    $username = $_POST['username'];
    $pass = $_POST['password'];

    if($username === "admin@gmail.com" && $pass === "123456"){
        $_SESSION['admin'] = $username;
        header("Location: ?action=giaodien"); // chuyển hướng
        exit;
    } else {
        $error = "Sai tên đăng nhập hoặc mật khẩu!";
    }
}

?>
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
        a{
            margin-left:130px;
        }
        button{
            margin-left:150px;
        }

    </style>
</head>
<body>
    <div class="top"><img src="./img/OIP.jpg" alt=""></div>
    <div class="dangnhap">
    <h2>Đăng nhập</h2>



    <form method="POST">
    <table>
        <tr>
            <td>Tên đăng nhâp:</td>
            <td><input type="email" name="username" required placeholder="Nhập email"></td>
        </tr>

        <tr>
            <td>Mật khẩu:</td>
            <td><input type="password" name="password" required placeholder="Nhập mật khẩu"></td>
        </tr>
        
    </table><br>

        <button type="submit" name="dangnhap">Đăng nhập</button>
    </form>

    <a href="?action=dangky">Đăng ký tài khoản</a>
     </div>

    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>
