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

    public function webphone(){
        include "views/chung/webphone.php";
    }

    public function dangxuat(){
        include "views/chung/webphone.php";
    }

    public function dangnhap(){
        include "views/chung/login.php";
    }

    public function giaodien(){
        
        include "views/administrator/giaodien.php";
    }

    public function trangchu(){
        include "views/user/trangchu.php";
    }

    public function gioithieu(){
        include "views/user/gioithieu.php";
    }

    public function lienhe(){
        include "views/user/lienhe.php";
    }

    public function sanpham(){
        include "views/user/sanpham.php";
    }


}

?>