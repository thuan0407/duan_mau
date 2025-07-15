<?php
class Comment{
    public $id;
    public $content;
    public $idproduct;
    public $date;
    public $iduser;
}

class CommentQuery extends BaseModel{
        public function create(Comment $comment){        //thêm danh comment
            try{
                $sql="INSERT INTO `comment` (`id`, `content`, `idproduct`, `date`, `iduser`)
                 VALUES (NULL, '".$comment->content."', '".$comment->idproduct."',
                '".$comment->date."', '".$comment->iduser."');";
                $data=$this->pdo->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }  
}
?>