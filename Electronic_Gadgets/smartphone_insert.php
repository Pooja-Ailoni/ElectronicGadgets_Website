<?php
include 'config.php';
if(isset($_POST['upload'])) {
	$brand=$_POST['brand'];
	$ram=$_POST['ram'];
	$height=$_POST['height'];
	$battery=$_POST['battery'];
	$storage=$_POST['storage'];
	$price=$_POST['price'];
	$filename = $_FILES['uploadfile']['name'];
	$filetmpname = $_FILES['uploadfile']['tmp_name'];
	$folder = 'Smartphone_Gallery/';
	$image=$folder.$filename;
	move_uploaded_file($filetmpname, $folder.$filename);
	$sql = "INSERT INTO smartphone(Image,Brand,Ram,Height,Battery,Price,Storage) VALUES(?,?,?,?,?,?,?);";
	if($stmt = $conn->prepare($sql))
	{
    	$stmt->bind_param("sssdsis",$image,$brand,$ram,$height,$battery,$price,$storage);
    	$stmt->execute();
   	 	echo "Records inserted successfully.";
 	} 
    else{
    	echo "ERROR: Could not prepare query: $sql. " . $conn->error;
    }
    $stmt->close();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
	<title>SmartPhones Insert</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
	</br>
	<h3 style="text-align: center;">SmartPhone Insert</h3>
	<center>
	<form action="smartphone_insert.php" method="post" enctype="multipart/form-data">
		<div class="form-group col-sm-3">
			<input type="text"  name="brand" id="brand" class="form-control" placeholder="Enter Brand Name"  required>
		</div>
		<div class="form-group col-sm-3">
			<input type="text"  name="ram" id="ram" class="form-control" placeholder="Enter Ram"  required>
		</div>
		<div class="form-group col-sm-3">
			<input type="text"  name="storage" id="storage" class="form-control" placeholder="Enter Storage"  required>
		</div>
		<div class="form-group col-sm-3">
			<input type="text"  name="height" id="height" class="form-control" placeholder="Enter height in cms"  required>
		</div>
		<div class="form-group col-sm-3">
			<input type="text"  name="battery" id="battery" class="form-control" placeholder="Enter Battery life"  required>
		</div>
		<div class="form-group col-sm-3">
			<input type="text"  name="price" id="price" class="form-control" placeholder="Enter amount"  required>
		</div>
		<div class="col-sm-3">
    		<input class="custom-file" type="file" name="uploadfile" type="text">
    	</div>
    	<div class="col-sm-3">
    	<input class="btn btn-success" type="submit" name="upload" value="upload">
    	</div>
  	</div>
    </form>
    </center>
</html>