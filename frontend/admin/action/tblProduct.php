<?php
include "./database.php";
try {

    $sql = "SELECT * FROM tblproduct";
    $result = $conn->query($sql);
} catch (Exception $e) {
    echo "Error " . $e->getMessage();
    exit();
}

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form add Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Form add Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <table class="table">
        <thead>
            <tr>
                <th scope="col">PID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->rowCount() > 0) : ?>
                <?php foreach ($result as $p) : ?>
                    <tr>
                        <th scope="row"><?= $p['pid'] ?></th>
                        <td><?= $p['pName'] ?></td>
                        <td><?= $p['price'] ?></td>
                        <td><?= $p['description'] ?></td>
                        <td><?= $p['img'] ?></td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>



</div>