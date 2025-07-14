<?php
class Category{
    public $id;
    public $name;
    public $sum;
    public $date;
}

class CategoryQuery extends BaseModel{
        public function all(){//hiện toàn bộ thông tin
            try{
                $sql="SELECT cate.*, COALESCE(SUM(pro.quantity),0) as sum FROM `category` as cate 
                LEFT JOIN product as pro ON pro.idcategory = cate.id GROUP BY cate.id ORDER BY sum DESC";
                $data=$this->pdo->query($sql)->fetchAll();
                $danhsach=[];
                foreach($data as $tt){
                    $danhmuc = new Category();
                    $danhmuc->id          =$tt['id'];
                    $danhmuc->name        =$tt['name'];
                    $danhmuc->date        =$tt['date'];
                    $danhmuc->sum         =$tt['sum'];
                    $danhsach[]=$danhmuc;
                }
                return $danhsach;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function create(Category $danhmuc){        //thêm danh mục
            try{
                $sql="INSERT INTO `category` (`id`, `name`, `date`) 
                VALUES (NULL, '".$danhmuc->name."', '".$danhmuc->date."');";
                $data=$this->pdo->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function delete_danhmuc($id){        //thêm danh mục
            try{
                $sql="DELETE FROM category WHERE `category`.`id` = $id";
                $data=$this->pdo->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }


        public function find($id){//tìm
            try{
                $sql="SELECT cate.*, COALESCE(SUM(pro.quantity),0) as sum FROM `category` as cate 
                LEFT JOIN product as pro ON pro.idcategory = cate.id Where cate.id=$id GROUP BY cate.id";
                $data=$this->pdo->query($sql)->fetch();
                if($data !== false){
                    $danhmuc = new Product();
                    $danhmuc->id          = $data['id'];
                    $danhmuc->name        = $data['name'];
                    $danhmuc->date        = $data['date'];
                    $danhmuc->sum         = $data['sum'];
                    return $danhmuc;
                }

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function update_danhmuc(Category $danhmuc){        //sửa danh mục
            try{
                $id = (int)$danhmuc->id;
                $sql="UPDATE `category` SET `name` = '".$danhmuc->name."' WHERE `category`.`id` = $id;";
                $data=$this->pdo->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function find_danhmuc($id){//tìm
            try{
                $sql="SELECT * FROM `category` WHERE id = $id";
                $data=$this->pdo->query($sql)->fetch();
                if($data !== false){
                    $danhmuc = new Category();
                    $danhmuc->id          = $data['id'];
                    $danhmuc->name        = $data['name'];
                    return $danhmuc;
                }    

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        } 
}
?>