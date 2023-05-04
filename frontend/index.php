<!DOCTYPE html>

<?php

	// php goes here

?> 


<html>

<?php include "components/head.php" ?>

<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
}
?>

<body>

	<?php include "./components/header.php" ?>
	<?php include "components/product.php" ?>
	<?php include "components/footer.php" ?>

</body>

</html>