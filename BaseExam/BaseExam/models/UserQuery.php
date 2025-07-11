<?php
class User{
    public $id;
    public $name;
    public $email;
    public $active;
    public $image;
    public $role;
    public $password;
    public $address;
    public $number;
}
class UserQuery extends BaseModel{
        public function all(){//hiện toàn bộ thông tin
            try{
                $sql="SELECT * FROM `user`";
                $data=$this->pdo->query($sql)->fetchAll();
                $dulieu=[];
                foreach($data as $tt){
                    $user = new User();
                    $user->id          = $tt['id'];
                    $user->name        = $tt['name'];
                    $user->image       = $tt['image'];
                    $user->email       = $tt['email'];
                    $user->number      = $tt['number'];
                    $user->address     = $tt['address'];
                    $user->password    = $tt['password'];
                    $user->role        = $tt['role'];
                    $user->active      = $tt['active'];
                    $dulieu[]=$user;
                }
                return $dulieu;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function create(User $user){        //thêm người dùng
            try{
                $sql="INSERT INTO `user` (`id`, `name`, `email`, `image`, `role`, `password`, `address`, `number`) 
                VALUES (NULL, '".$user->name."', '".$user->email."', '".$user->image."',
                 '".$user->role."', '".$user->password."', '".$user->address."', '".$user->number."');";
                $data=$this->pdo->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }
}
?>