<?php 
    $connection = new mysqli('localhost', 'root', '', 'php12-1', 3308);
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
    function show_product(){
        global $connection;

        $sql_show = "
                        SELECT * FROM `accessories` WHERE 1 ORDER BY `id` DESC 
                    ";  
        $result   = $connection -> query($sql_show);
        while($row = mysqli_fetch_assoc($result)){
            echo '
                <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>
                        <img src="../image/'.$row['image'].'" alt="'.$row['image'].'">
                    </td>
                    <td>'.$row['price'].'</td>
                    <td>'.$row['category'].'</td>
                    <td>'.$row['brand'].'</td>
                    <td>
                        <button class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            ';
        }
    }
   