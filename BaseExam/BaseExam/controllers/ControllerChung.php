<?php
class ControllerChung{
    public $categoryQuery;
    public $commentQuery;
    public $productQuery;
    public $userQuery;

    public function __construct(){
        $this->categoryQuery = new CategoryQuery();
        $this->userQuery = new UserQuery();
        $this->productQuery = new ProductQuery();
        $this->commentQuery = new CommentQuery();
    }

    //phía người quản trị
    public function webphone(){
        include "views/chung/webphone.php";
    }

    public function dangnhap(){
        $err="";
        $dulieu_taikhoan = $this->userQuery->all();

        if(isset($_POST['dangnhap'])){
            $email    = trim($_POST['email']);
            $password = trim($_POST['password']);
            $role     = (int)$_POST['role'];
            $kiemtra = false;

            foreach($dulieu_taikhoan as $tt){
                if($email === $tt->email && $password === $tt->password && $role === (int)$tt->role){
                    $kiemtra = true;
                    
                    if($role ===0){
                        header("Location: ?action=giaodien");
                        exit;
                    }
                    elseif($role ===1){
                        header("Location: ?action=trangchu");
                        exit;
                    }
                } 

            }
            if(!$kiemtra){
                    $err ="kiểm tra lại các dữ liệu của bạn!";
                }
        }
        include "views/chung/login.php";
    }


    public function dangky(){
        $loi="";
        $thanhcong="";
        $user = new User();
        if(isset($_POST['dangky'])){
            $user->name=$_POST['name'];
            $user->email=$_POST['email'];
            $user->address=$_POST['address'];
            $user->number=$_POST['number'];
            $user->password=$_POST['password'];
            $user->role=(int)1;


            if(empty($user->name)===""||empty($user->address)===""||empty($user->number)===""||empty($user->password)==="" ||empty($user->email)===""){
                $loi="kiểm tra lại các trường giữ liệu";
            }
            else{
                $ketqua = $this->userQuery->create($user);
                if($ketqua ===1){
                    $thanhcong="Đăng ký thành công";
                }
                else{
                    $loi="Đăng ký thất bại";
                }
            }
        }
        
       include "views/chung/dangky.php";
    }



}

?>