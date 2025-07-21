<?php
class ControllerUser{
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

    public function trangchu($hot){
        $danhsach= $this->categoryQuery->all();
        $danhsach_hot1= $this->productQuery->all_hot1();
        $danhsach_hot2= $this->productQuery->all_hot2();
        $danhsach_khuyenmai = $this->productQuery->all_khuyenmai();
        if(isset($_POST['logout'])){
                             // Xóa toàn bộ session
            session_unset(); // Xóa tất cả biến session
            session_destroy(); // Hủy toàn bộ session

            // Chuyển hướng về trang đăng nhập hoặc trang chủ
            header("Location: ?action=dangnhap");
    exit;

        }
        include "views/user/trangchu.php";
    }

    public function hot1(){
        $danhsach_hot1= $this->productQuery->all_hot1();
        include "views/user/trangchu.php";
    }

    public function hot2(){
        $danhsach_hot2= $this->productQuery->all_hot2();
        include "views/user/trangchu.php";
    }

    public function khuyenmai(){
        $danhsach_khuyenmai = $this->productQuery->all_khuyenmai();
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

    public function chi_tiet_sp($id){
        $chi_tiet_sp = $this->productQuery->find($id);      // dữ liệu chi tiết của sản phẩm
        $loai= $chi_tiet_sp->idcategory;                    // loại của sản phẩm trực thuộc
        $sp_lien_quan =$this->productQuery->find_tt($loai); // dữ liệu các sản phẩm liên quan
        $comment =$this->productQuery->find_comment($id);   // nội dung bình luận của sản phẩm
        
        $comment1 = new Comment();
        if(isset($_POST['gui'])){
            $comment1->content        = $_POST['comment'];
            $comment1->date           = date("Y-m-d H:i:s");
            $comment1->idproduct      = $id;
            $comment1->iduser         = $_SESSION['iduser'];
             
            $noidung =$_POST['comment'];
            if(!empty($noidung)){
                 $ketqua = $this->commentQuery->create($comment1);
                if($ketqua ===1){
                    $comment = $this->productQuery->find_comment($id);
                }
            }


        }
        include "views/user/trang_chi_tiet.php";
    }


}

?>