<?php 
	$server_name = "localhost";
	$username = "root";
	$pass = "";
	$dbname = "mvc_db";

	$connection = new mysqli($server_name,$username,$pass,$dbname);
	if ($connection -> connect_error) {
		die("Connection to database is error !");
	}

	$pname = $_POST['pName'];
	$price = $_POST['price'];
	$imgname = $_POST['txt_imgname'];
	$desc = $_POST['description'];

	// $filename = $_FILES['txt_image']['name'];
	// $tempname = $_FILES['txt_image']['tmp_name'];
	// $folder = "image/".$filename;

	$insert = "INSERT INTO tblProduct VALUES (null, '".$pname."', '".$price."', '".$imgname."', '".$desc."' )";

	// these code below is use to insert data to db and upload image to folder
	if($connection -> query($insert)===True){
		echo "Insert successfully";
	}else{
		echo "Error ".$insert."</br>".$connection->error;
	}
	// move_uploaded_file($tempname, $folder);

?>