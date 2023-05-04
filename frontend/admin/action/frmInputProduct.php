<?php

  require("../database.php");

  if ($_POST) {
    $pname = trim($_POST['pName']);
    $price = trim($_POST['price']);
    $img = trim($_POST['img']);
    $des = trim($_POST['description']);

    try{

      $sql ='INSERT INTO tblProduct (pName, price, img, description)
            Value (:pname, :price, :img, :description)';

      $stmt = $conn->prepare($sql);
      $stmt->bindParam(":pName", $pname);      
      $stmt->bindParam(":price", $price); 
      $stmt->bindParam(":img", $img); 
      $stmt->bindParam(":description", $des); 

      $stmt->execute();

      if($stmt->rowCount()){
        header("location: create.php?status=created");
        exit();
      }
      header("location: create.php?status=fail_created");

    }catch(Exception $e){
      
    }

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
              <form>
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
                    <input type="text" class="form-control" name="description" id="description" placeholder="Enter Product Description">
                  </div>
                  <div class="form-group">
                    <label for="img">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="img">
                        <label class="custom-file-label" name="img" for="img">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <input type="submit" class="input-group-text">
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
          <!-- /.col-md-6-->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->