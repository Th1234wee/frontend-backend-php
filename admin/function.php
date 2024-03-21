<?php 
    $connection = new mysqli('localhost','root','','php12-1',3308);
    function upload_file($image_name){
        $path      = '../image/'.$image_name;
        move_uploaded_file($_FILES['_file']['tmp_name'] , $path);
    }
    function add_product(){
        global $connection;

        if(isset($_POST['accept_add'])){
            $name           = $_POST['_name'];
            $image          = $_FILES['_file']['name'];
            $price          = $_POST['_price'];
            $category       = $_POST['_category'];
            $brand          = $_POST['_brand'];
            if(!empty($name) && !empty($image) && !empty($price) && !empty($category) &&!empty($brand) ){
                $thumbnail = date('YmdHis') .'-'. $image;
                upload_file($thumbnail);

                $sql_insert = "
                                  INSERT INTO `accessories`(`id`, `name`, `image`, `price`, `category`, `brand`) 
                                  VALUES (null,'$name','$thumbnail','$price','$category','$brand');
                            ";
                $result     = $connection -> query($sql_insert);
                if($result){
                    echo 123;
                }
            }
        }
    }
    add_product();
   