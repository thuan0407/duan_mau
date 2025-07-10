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
}

?>