  <!-- Content Wrapper. Contains page content -->

  <?php

  $user = "root";
  $pass = "";
  $dsn = "mysql:host=localhost;dbname=mvc_db";

  try {

    $conn = new PDO(dsn, user, pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo "connect";
  } catch (Exception $e) {
    echo " Error " . $e->getMessage();
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
                    <input type="text" class="form-control" id="pName" placeholder="Enter Product Name">
                  </div>
                  <div class="form-group">
                    <label for="price">Product Price</label>
                    <input type="text" class="form-control" id="price" placeholder="Enter Product Price">
                  </div>
                  <div class="form-group">
                    <label for="description">Product descreption</label>
                    <input type="text" class="form-control" id="description" placeholder="Enter Product Description">
                  </div>
                  <div class="form-group">
                    <label for="img">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="img">
                        <label class="custom-file-label" for="img">Choose file</label>
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