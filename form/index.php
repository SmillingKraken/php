<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>

<?php
require 'config.php';
if (isset($_POST["submit"])) {
    $pName = $_POST["pName"];
    $price = $_POST["price"];
    $img = $_POST["img"];
    $description = $_POST["description"];
    $query = "INSERT INTO tblproduct VALUES('','$pName','$price','$img','$description')";
    mysqli_query($conn, $query);
    echo
        "<script> alert('Registration Successful'); </script>";
    
}
?>

<body>

    <form class="container frm-container" action="" method="post" autocomplete="off">
        <div class="container mb-3 col-4">
            <h2>Add Product</h2>
        </div>

        <div class="container mb-3 col-4">
            <label for="pName" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="pName" id="pName" aria-describedby="emailHelp">
        </div>
        </div>
        <div class="container mb-3 col-4">
            <label for="price" class="form-label">price</label>
            <input type="text   " class="form-control" name="price" id="price" required value=""
                aria-describedby="emailHelp">
        </div>
        <div class="container mb-3 col-4">
            <label for="img" class="form-label">img</label>
            <input type="file" class="form-control" name="img" id="img" required value="">
        </div>
        <div class="container mb-3 col-4">
            <label for="description" class="form-label">description</label>
            <input type="text" class="form-control" name="description" id="description" required value="">
        </div>
        <div class="container mb-3 col-4 ">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="container mb-3 col-4 ">
            <label class="" for="exampleCheck1"><a href="login.php">Login</a></label>
        </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>