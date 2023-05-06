<?php 

	$img_name = $_FILES["img"]["name"];
	//echo $img_name;
	//echo '<br>';
	//echo $t;
	$temp = explode(".",$_FILES["img"]["name"]);
	//echo end($temp);

	date_default_timezone_set("Asia/Bangkok");
	$date = "_".date("Y-M-d-h-i-a");

	$img_name="product_"."image_".rand(10,999).$date. '.' .end($temp);	
	//
	//echo $img_name;

	$tmp=$_FILES['img']['tmp_name'];
	//echo $tmp;
	//
	move_uploaded_file($tmp,"image/".$img_name);	
	$status['image']=$img_name;
	echo json_encode($status);
 ?>