    <?php
    class Product{
        public $id;
        public $name;
        public $image;
        public $price;
        public $idcategory;
        public $description;
        public $hot;
        public $view;
        public $discount;
        public $quantity;

    }
    class ProductQuery extends BaseModel{
        public function all(){//hiện toàn bộ thông tin
            try{
                $sql="SELECT * FROM `product`";
                $data=$this->pdo->query($sql)->fetchAll();
                $dulieu=[];
                foreach($data as $tt){
                    $sanpham = new Product();
                    $sanpham->id=$tt['id'];
                    $sanpham->name        = $tt['name'];
                    $sanpham->image       = $tt['image'];
                    $sanpham->price       = $tt['price'];
                    $sanpham->idcategory  = $tt['idcategory'];
                    $sanpham->description = $tt['description'];
                    $sanpham->hot         = $tt['hot'];
                    $sanpham->view        = $tt['view'];
                    $sanpham->discount    = $tt['discount'];
                    $sanpham->quantity    = $tt['quantity'];
                    $dulieu[]=$sanpham;
                }
                return $dulieu;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function delete($id){//xóa
            try{
                $sql="DELETE FROM product WHERE `product`.`id` = $id";
                $data=$this->pdo->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function find($id){//tìm
            try{
                $sql="SELECT * FROM `product` WHERE id = $id";
                $data=$this->pdo->query($sql)->fetch();
                if($data !== false){
                    $sanpham = new Product();
                    $sanpham->id          =$data['id'];
                    $sanpham->name        = $data['name'];
                    $sanpham->image       = $data['image'];
                    $sanpham->price       = $data['price'];
                    $sanpham->idcategory  = $data['idcategory'];
                    $sanpham->description = $data['description'];
                    $sanpham->hot         = $data['hot'];
                    $sanpham->view        = $data['view'];
                    $sanpham->discount    = $data['discount'];
                    $sanpham->quantity    = $data['quantity'];
                    return $sanpham;
                }

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function update(Product $sanpham){//xóa
            try{
                $id=(int)$sanpham->id;
                $sql="UPDATE `product` SET `name` = '".$sanpham->name."', `image` = '".$sanpham->image."',
                 `price` = '".$sanpham->price."', `idcategory` = '".$sanpham->idcategory."', 
                 `description` = '".$sanpham->description."', `hot` = '".$sanpham->hot."', 
                 `view` = '".$sanpham->view."', `discount` = '".$sanpham->discount."', `quantity` ='".$sanpham->quantity."' WHERE `product`.`id` = $id;";
                $data=$this->pdo->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function create(Product $sanpham){        //thêm sản phẩm
            try{
                $sql="INSERT INTO `product` (`id`, `name`, `image`, `price`, `idcategory`, `description`, `hot`, `discount`, `quantity`) 
                VALUES (NULL, '".$sanpham->name."', '".$sanpham->image."', '".$sanpham->price."', '".$sanpham->idcategory."',
                 '".$sanpham->description."', '".$sanpham->hot."', '".$sanpham->discount."',
                 '".$sanpham->quantity."');";
                $data=$this->pdo->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }
    }
    ?>