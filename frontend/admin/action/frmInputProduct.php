<?php
require("../database.php");

// $pname = $_POST['pName'];
// $price = $_POST['price'];
// $des = $_POST['description'];

try {

  $sql = 'INSERT INTO tblProduct (pName, price, img, description)
            Value (:pname, :price, :img, :description)';

  $stmt = $conn->prepare($sql);
  $stmt->bindParam(":pName", $pname);
  $stmt->bindParam(":price", $price);
  $stmt->bindParam(":img", $img);
  $stmt->bindParam(":description", $des);

  $stmt->execute();

  if ($stmt->rowCount()) {
    header("location: create.php?status=created");
    exit();
  }
  header("location: create.php?status=fail_created");

} catch (Exception $e) {

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
            <form method="post" class="frmInputProduct" enctype="multipart/form-data">
            
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
                      <input type="file" class="custom-file-input" id="img_prod" name="img">
                      <label class="custom-file-label" for="img_prod">Choose file</label>
                    </div>

                    <input type="text" name="txt_imgname" id="txt_imgname" style="width: 350px;">

                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <input id="button" type="button" name="btn_insert" value="Save Product" class="btn btn-primary btn_save">
              </div>
            </form>
            <!-- /.form end-->

            <script src = "https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <script src="./jquery-3.2.1.min.js"></script>
            <script>

              $('.btn_save').click(function () {

                var frm = $(this).closest('form.frmInputProduct');
                var frm_data = new FormData(frm[0]);

                var name = $('#pName');
                var price = $('#price');
                var img = $('#txt_imgname');
                var desc = $('#description');

                if (name.val() == '') {
                  alert('Please enter product name!');
                  name.focus();
                } else if (price.val() == '') {
                  alert('Please enter price!');
                  price.focus();
                } else if (img.val() == '') {
                  alert('Please select product picture!');
                  img.focus();
                } else {
                  $.ajax({
                    url: 'insert_act.php',
                    type: 'POST',
                    data: frm_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function (data) {
                      alert(date.msg);
                      window.location.href = "frmInputProduct.php"
                    }
                  });
                }

              });

              $('body').on('change', '#img_prod', function () {
                var eThis = $(this);
                var img_box = eThis.parent();
                var img_name = $('body').find('#txt_imgname');
                var frm = $(this).closest('form.frmInputProduct');
                var frm_data = new FormData(frm[0]);
                //alert("Bokalo");
                $.ajax({
                  url: 'upl-img.php',
                  type: 'POST',
                  data: frm_data,
                  contentType: false,
                  cache: false,
                  processData: false,
                  dataType: "json",
                  success: function (data) {
                    alert('Image inserted successfully');
                    img_name.val(data.image);
                  }
                });
              });
            </script>

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