<!DOCTYPE html>
<?php
	if(isset($_POST['laptop'])){
	 $url="laptop_insert.php";
	     echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; 
        exit;
	}
	if(isset($_POST['smartphone'])){
	 $url="smartphone_insert.php";
	     echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; 
        exit;
	}
	if(isset($_POST['tv'])){
	 $url="Tv_insert.php";
	     echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; 
        exit;
	}
	if(isset($_POST['powerbank'])){
	 $url="Powerbank_insert.php";
	     echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; 
        exit;
	}
?>
<html>
<head>
	<title>UPDATE</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
        <h3 style="text-align: center;">Updation Page</h3>
        </br>
        <center>
        <form action="#" method="post">
                <input type="submit" name="smartphone" class="btn btn-outline-primary" value="Update SmartPhone"/>
                <input type="submit" name="laptop" class="btn btn-outline-success" value="Update Laptop"/>
                <input type="submit"name="tv" class="btn btn-outline-danger" value="Update TV"/>
                <input type="submit"name="powerbank" class="btn btn-outline-danger" value="Update powerbank"/>
        </form>
        </center>
</body>
</html>