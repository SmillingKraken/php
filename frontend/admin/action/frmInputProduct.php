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

  $pname = $_POST['pName'];
  $price = $_POST['price'];
  $des = $_POST['description'];
  
//   try {

//     $sql = 'INSERT INTO tblProduct (pName, price, img, description)
//             Value (:pname, :price, :img, :description)';

//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(":pName", $pname);
//     $stmt->bindParam(":price", $price);
//     $stmt->bindParam(":img", $img);
//     $stmt->bindParam(":description", $des);

//     $stmt->execute();

//     if ($stmt->rowCount()) {
//       header("location: create.php?status=created");
//       exit();
//     }
//     header("location: create.php?status=fail_created");

//   } catch (Exception $e) {

//   }

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
      <div class="row">
        <div class="col-md-12">


          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="pName">Product Name</label>
                  <input type="text" class="form-control" name="pName" id="pName" placeholder="Enter Product Name">
                </div>
                <div class="form-group">
                  <label for="price">Product Price</label>
                  <input type="text" class="form-control" name="price" id="price" placeholder="Enter Product Price">
                </div>
                <div class="form-group">
                  <label for="description">Product descreption</label>
                  <input type="text" class="form-control" name="description" id="description"
                    placeholder="Enter Product Description">
                </div>
                <div class="form-group">
                  <label for="img">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="img">
                      <label class="custom-file-label" name="img" for="img">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <input type="submit" id="submit" name="submit" class="input-group-text">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
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