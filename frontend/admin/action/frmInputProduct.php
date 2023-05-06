<?php
//require("./database.php");
$conn = mysqli_connect("localhost", "root", "", "mvc_db");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
  $pName = $_POST["pName"];
  $price = $_POST["price"];
  $img = $_POST["image"];
  $description = $_POST["description"];
  if($_FILES["image"]["error"] == 4){
    echo
    "<script> alert('Image Does Not Exist'); </script>"
    ;
  }
  else{
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if ( !in_array($imageExtension, $validImageExtension) ){
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    }
    else if($fileSize > 1000000){
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    }
    else{
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, 'img/' . $newImageName);
      $query = "INSERT INTO tblproduct VALUES('','$pName','$price','$newImageName','$description')";

      mysqli_query($conn, $query);
      echo
      "
      <script>
        alert('Successfully Added');
        document.location.href = 'data.php';
      </script>
      ";
    }
  }

  echo
      "<script> alert('Registration Successful'); </script>";
  
}


?>

<!-- Content Wrapper. Contains page content -->
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

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="">
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
            <label for="image" class="form-label">img</label>
            <input type="file" class="form-control" name="image" id="image" required value="">
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
        <!-- /.col-md-6-->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->