<?php
class ControllerQuery{
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
    
    public function dangxuat(){
        include "views/chung/webphone.php";
    }

    public function dangnhap(){
        $err="";
        $user = $this->userQuery->all();
        if(isset($_POST['dangnhap'])){
            $email = $_POST['email'];
            $pass = $_POST['password'];

            foreach($user as $user){
            if($email === "admin@gmail.com" && $pass === "123456"){
                $_SESSION['admin'] = $email;
                header("Location: ?action=trangchu_admin"); // chuyển hướng
                exit;
            } else if($email === $user->email && $pass === $user->password){
                $_SESSION['user'] = $user->name;
                header("Location: ?action=trangchu"); // chuyển hướng
                exit;
            }
            else{
                $err="Đăng nhập thất bại hãy kiểm tra lại các trường thông tin";
            }
            }

        }
        include "views/chung/login.php";
    }

    public function giaodien(){
        
        include "views/administrator/giaodien.php";
    }
    public function trangchu_admin(){
        include "views/administrator/trangchu.php";
    }

    public function quanly_sanpham(){
        $err="";
        $danhsach = $this->productQuery->all();
        if(isset($_POST['tim'])){
            $tukhoa =$_POST['tukhoa'];
           
                if(empty($tukhoa)){
                    $err= "bạn chưa nhập nội dung";
                }

                foreach($danhsach as $tt){
                    if(stripos($tt->name,$tukhoa) !==false ){
                        $ketqua[]=$tt;
                    }
                }

                
                if(empty($ketqua)){
                    $err="không tìm thấy";
                    $danhsach=[];
                }
                else{
                    $danhsach=$ketqua;
                }

            
        }
        
        
        include "views/administrator/quanly_sanpham.php";
    }

    public function quanly_danhmuc(){
        $danhsach = $this->categoryQuery->all();
        $thanhcong="";
        $loi="";
        $danhmuc = new Category();
        if(isset($_POST['create'])){
            $danhmuc->name  = $_POST['name_danhmuc'];
            $danhmuc->date  = date("Y-m-d H:i:s");
            if(empty($danhmuc->name)){
                $loi="kiểm tra lại dữ liệu";
            }
            else{
                $ketqua = $this->categoryQuery->create($danhmuc);
                if($ketqua ===1){
                    $thanhcong="tạo danh mục thành công";
                }
                else{
                    $loi="tọa danh mục thất bại";
                }
            }
        }
        
        include "views/administrator/quanly_danhmuc.php";
    }

    public function update_danhmuc($id){
        $ten_danhmuc_cu=$this->categoryQuery->find($id);
        $thanhcong="";
        $loi="";
        $danhmuc= new Category();
        if(isset($_POST['update_danhmuc'])){
            $danhmuc->id   = $id;
            $danhmuc->name = $_POST['name_danhmuc'];
            if(empty($danhmuc->name)){
                $loi="kiểm tra lại dữ liệu";
            }
            else{
                 $ketqua =$this->categoryQuery->update_danhmuc($danhmuc);
                if($ketqua >0){
                    $thanhcong="sửa thành công tên thư mục";
                }
            }
        }

        include "views/administrator/update_danhmuc.php";
    }

public function delete_danhmuc($id) {
    $danhmuc = $this->categoryQuery->find($id);
    $thongbao = "";
    $loi="";
    $thanhcong="";

    // Kiểm tra tồn tại và số lượng sản phẩm
    if (!$danhmuc) {
        $thongbao = "Danh mục không tồn tại!";
    } else if ($danhmuc->sum > 0) {
        $thongbao = "Không thể xóa khi danh mục vẫn còn sản phẩm.";
    } else {
        // Cho phép xóa
        $ketqua = $this->categoryQuery->delete_danhmuc($id);
        if ($ketqua === 1) {
            header("Location: ?action=quanly_danhmuc");
            exit;
        } else {
            $thongbao = "Xóa danh mục thất bại.";
        }
    }

    // Load lại danh sách danh mục và view
    $danhsach = $this->categoryQuery->all();
    include "views/administrator/quanly_danhmuc.php";
}


    public function quanly_taikhoan(){
        $err="";
        $danhsach = $this->userQuery->all();
        if(isset($_POST['tim'])){
            $user =$_POST['user'];
            if(empty($user)){
             $err="bạn chưa nhập tên người dùng";
            }
            
            foreach($danhsach as $tt){
                if(stripos($tt->email,$user)!==false || stripos($tt->name,$user)!==false){
                    $ketqua[]=$tt;
                }
            }
            if(empty($ketqua)){
                $err="không tìm thấy";
            }
            else{
                $danhsach=$ketqua;
            }
        }
        include "views/administrator/quanly_taikhoan.php";
    }

    public function quanly_binhluan(){
        $danhsach = $this->productQuery->all();
        
        include "views/administrator/quanly_binhluan.php";
    }

    public function quanly_donhang(){
        $danhsach = $this->productQuery->all();
        
        include "views/administrator/quanly_donhang.php";
    }

    //luồng sử lý phần quản lý sản phẩm
    public function delete_sanpham($id){
        $ketqua = $this->productQuery->delete($id);
        if($ketqua ===1){
            header("Location: ?action=quanly_sanpham");
            exit;
        }
        else{
            $loi ="không thể xóa";
            $danhsach->this->productQuery->all();
             include "views/administrator/quanly_sanpham.php";
        }
    }

public function create_sanpham() {
    // Lấy sản phẩm theo ID để hiển thị lên form
    $loi ="";
    $thanhcong="";
    $sanpham = new Product();
    $danhsach =$this->categoryQuery->all();

    if (isset($_POST['create_sanpham'])) {
        // Cập nhật dữ liệu mới từ form
        $sanpham->name        = $_POST['name'];
        if($_FILES['anh_sp']['size']>0){
            $sanpham->image = upload_file('anh',$_FILES['anh_sp']);
        }
        $sanpham->price       = $_POST['price'];
        $sanpham->idcategory  = $_POST['idcategory'];
        $sanpham->description = $_POST['description'];
        $sanpham->hot         = $_POST['hot'];
        $sanpham->discount    = $_POST['discount'];
        $sanpham->quantity    = $_POST['quantity'];

        if($sanpham->name ===""){
            $loi = "kiểm tra lại các trường giữ liệu";
        }
        else{
            $ketqua_update = $this->productQuery->create($sanpham);
                if($ketqua_update ===1){
                    $thanhcong="create sản phẩm thành công";
                }
                else{
                    $loi ='create sản phẩm thất bại';
                }
            }
        }
    

    // Hiển thị giao diện sửa
    include "views/administrator/create_sanpham.php";
}

public function update_sanpham($id) {
    // Lấy sản phẩm theo ID để hiển thị lên form
    $loi ="";
    $thanhcong="";
    $sanpham = $this->productQuery->find($id);
    $danhsach =$this->categoryQuery->all();

    if (isset($_POST['update_sanpham'])) {
        // Cập nhật dữ liệu mới từ form

        $sanpham->id         =$id;
        $sanpham->name        = $_POST['name'];
        if($_FILES['anh_sp']['size']>0){
            $sanpham->image = upload_file('anh',$_FILES['anh_sp']);
        }
        $sanpham->price       = $_POST['price'];
        $sanpham->idcategory  = $_POST['idcategory'];
        $sanpham->description = $_POST['description'];
        $sanpham->hot         = $_POST['hot'];
        $sanpham->discount    = $_POST['discount'];
        $sanpham->quantity    = $_POST['quantity'];

        if($sanpham->name ===""){
            $loi = "kiểm tra lại các trường giữ liệu";
        }
        else{
            $ketqua_update = $this->productQuery->update($sanpham);
                if($ketqua_update >0){
                    $thanhcong="update sản phẩm thành công";
                }
                else{
                    $loi ='update sản phẩm thất bại';
                }
            }
        }
    

    // Hiển thị giao diện sửa
    include "views/administrator/update_sanpham.php";
}



    //phía khách hàng============================================
    public function trangchu($hot){
        $danhsach= $this->categoryQuery->all();
        $danhsach_sp1= $this->productQuery->all_hot1();
        $danhsach_sp2= $this->productQuery->all_hot2();
        include "views/user/trangchu.php";
    }

    public function gioithieu(){
        include "views/user/gioithieu.php";
    }

    public function lienhe(){
        include "views/user/lienhe.php";
    }

    public function sanpham(){
        $danhsach=$this->productQuery->all();
        include "views/user/sanpham.php";
    }

    public function danhmuc($id){
        $loaidanhmuc=$this->categoryQuery->find_danhmuc($id);
        include "views/user/danhmuc.php";
    }


}

?>