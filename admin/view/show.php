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
        <button id="open_add" class="btn btn-outline-primary"data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-plus"></i> Add Product</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        $("#open_add").on("click",function(){
            $("#accept_add").show();
            $("#accept_edit").hide();
        })
        $("body").on("click","#open_edit",function(){
            $("#accept_add").hide();
            $("#accept_edit").show();

            var id         =   $(this).parents('tr').find('td').eq(0).text();
            var name       =   $(this).parents('tr').find('td').eq(1).text();
            var image      =   $(this).parents('tr').find('td:eq(2) img').attr('alt');
            var price      =   $(this).parents('tr').find('td').eq(3).text();
            var category   =   $(this).parents('tr').find('td').eq(4).text();
            var brand      =   $(this).parents('tr').find('td').eq(5).text();

            $("#id").val(id);
            $("#name").val(name);
            $("#old_profile").val(image);
            $("#price").val(price);
            $("#category").val(category);
            $("#brand").val(brand);
        })
    })
</script>