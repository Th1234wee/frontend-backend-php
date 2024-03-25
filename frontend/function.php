<?php
$connection = new mysqli('localhost', 'root', '', 'php12-1', 3308);
function get_product_show(){
    global $connection;
    $sql_select   =  "
                            SELECT * FROM `accessories` WHERE 1 ORDER BY `id` DESC
                        ";
    $result       = $connection->query($sql_select);

    while ($row  =  mysqli_fetch_assoc($result)) {
        echo  '
            <div class="card-box border border-5">
                <div class="card-header">
                    <h3 class="text-center">' . $row['name'] . '</h3>
                </div>
                <div class="card-body">
                    <img src="../../admin/image/'.$row['image'].'" alt=" '.$row['image'].'">
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <p class="mt-2">$ ' . $row['price'] . '</p>
                    <button class="btn btn-success">Add To Cart</button>
                </div>
            </div>   
                 ';
    }
}
