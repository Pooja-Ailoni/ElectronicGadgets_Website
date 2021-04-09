<?php
include 'config.php';
if(isset($_POST['upload'])) {
	$brand=$_POST['brand'];
	$power=$_POST['power'];
	$battery=$_POST['battery'];
	$price=$_POST['price'];
	$filename = $_FILES['uploadfile']['name'];
	$filetmpname = $_FILES['uploadfile']['tmp_name'];
	$folder = 'Powerbank_Gallery/';
	$image=$folder.$filename;
	move_uploaded_file($filetmpname, $folder.$filename);
	$sql = "INSERT INTO powerbank(Image,Brand,Power,Battery,Price) VALUES(?,?,?,?,?);";
	if($stmt = $conn->prepare($sql))
	{
    	$stmt->bind_param("ssssi",$image,$brand,$power,$battery,$price);
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
	<title>PowerBank Insert</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
	<form class="form-inline" action="	Powerbank_insert.php" method="post" enctype="multipart/form-data">
		<input type="text" name="brand" id="brand" class="form-control" placeholder="Enter Brand Name"  required>
		<input type="text" name="power" id="power" class="form-control" placeholder="Enter Power"  required>
		<input type="text" name="battery" id="battery" class="form-control" placeholder="Enter Battery life"  required>
		<input type="text" name="price" id="price" class="form-control" placeholder="Enter amount"  required>
    	<input class="custom-file" type="file" name="uploadfile" type="text">
    	<input class="btn btn-success" type="submit" name="upload" value="upload">
    </form>
</html>