<?php
class Category{
    public $id;
    public $name;
}

class CategoryQuery extends BaseModel{
        public function all(){//hiện toàn bộ thông tin
            try{
                $sql="SELECT * FROM `category`";
                $data=$this->pdo->query($sql)->fetchAll();
                $danhsach=[];
                foreach($data as $tt){
                    $loai = new Category();
                    $loai->id          =$tt['id'];
                    $loai->name        =$tt['name'];
                    $danhsach[]=$loai;
                }
                return $danhsach;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }
}
?>