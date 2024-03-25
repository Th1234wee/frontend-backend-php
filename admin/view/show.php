<?php 
    include '../function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        include '../../shared/style.php';
    ?>
    <link rel="stylesheet" href="../style/show.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
</head>
<body>
    <div class="container p-4 border border-5 d-flex justify-content-between my-4">
        <h3>Accessories Store</h3>
        <button class="btn btn-outline-primary"data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-plus"></i> Add Product</button>
    </div>
    <div class="container">
        <table class="table table-hover align-middle" style="table-layout: fixed;">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Action</th>
            </tr>
            <?php
                show_product();
            ?>
        </table>
    </div>
    <?php 
        include 'modal.php';
    ?>
</body>
</html>