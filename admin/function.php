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
                        <img src="../../admin/image/'.$row['image'].'" alt="'.$row['image'].'">
                    </td>
                    <td>'.$row['price'].'</td>
                    <td>'.$row['category'].'</td>
                    <td>'.$row['brand'].'</td>
                    <td>
                        <button id="open_edit" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button  class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            ';
        }
    }
    function edit_product(){
        global $connection;

        if(isset($_POST['accept_edit'])){
            $update_id    =   $_POST['_id'];
            $name         =   $_POST['_name'];
            $image        =   $_FILES['_file']['name']; //new image
            $price        =   $_POST['_price'];
            $category     =   $_POST['_category'];
            $brand        =   $_POST['_brand'];
            $old_image    =   $_POST['old_profile'];

            if(empty($image)){
                $thumnail  =  $old_image;
            }
            else{
                $thumnail  = date('YmdHis') . '-' . $image;
                upload_file($thumnail);
            }
            if(!empty($name) && !empty($price) && !empty($category) &&!empty($brand) ){
                $sql_edit  =   "
                                    UPDATE `accessories`
                                    SET    `name`  = '$name' , `image`    = '$thumnail',
                                           `price` = '$price', `category` = '$category',
                                           `brand` = '$brand'
                                     WHERE `id`    = '$update_id';
                               ";
                $result    =  $connection -> query($sql_edit);
                if($result){
                    echo "Success";
                }
            }

        }
    }
    edit_product();
   