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

        public function all_hot1(){//hiện toàn bộ thông tin
            try{
                $sql="SELECT * FROM `product` Where hot = 1 LIMIT 4";
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

        public function all_hot2(){//hiện toàn bộ thông tin
            try{
                $sql="SELECT * FROM `product` Where hot = 2 LIMIT 4";
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

public function find_tt($loai) { // Tìm sản phẩm liên quan theo loại
    try {
        $sql = "SELECT pro.* FROM `product` as pro 
                JOIN category as cate
                ON pro.idcategory = cate.id 
                WHERE pro.idcategory = $loai";

        $stmt = $this->pdo->query($sql);
        $list_sp = [];

        while ($data = $stmt->fetch()) {
            $sanpham = new Product();
            $sanpham->id          = $data['id'];
            $sanpham->name        = $data['name'];
            $sanpham->image       = $data['image'];
            $sanpham->price       = $data['price'];
            $sanpham->idcategory  = $data['idcategory'];
            $sanpham->description = $data['description'];
            $sanpham->hot         = $data['hot'];
            $sanpham->view        = $data['view'];
            $sanpham->discount    = $data['discount'];
            $sanpham->quantity    = $data['quantity'];

            $list_sp[] = $sanpham; // Thêm vào mảng
        }

        return $list_sp;

    } catch (PDOException $err) {
        echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        return []; // Trả về mảng rỗng nếu lỗi
    }
}

        public function find_comment($id){//hiện toàn bộ thông tin
            try{
                $sql="SELECT cmt.content, pro.*, user.name as nameUser, user.id as iduser FROM `product` as pro 
                    JOIN comment  as cmt  ON pro.id        = cmt.idproduct
                    JOIN user     as user ON user.id       = cmt.iduser 
                    Where pro.id =$id";
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
                    $sanpham->nameUser    = $tt['nameUser'];
                    $sanpham->content     = $tt['content'];
                    $sanpham->iduser      = $tt['iduser'];
                    $dulieu[]=$sanpham;
                }
                return $dulieu;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

    }
    ?>