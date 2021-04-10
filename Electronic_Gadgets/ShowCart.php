<?php
	include 'config.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Georgia" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Prata" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Helvetica" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Electronics</title>
</head>
<body>
	<div class="container-fluid">
     <div class="row">
		<?php
         $res=mysqli_query($conn,"select * from cart");
         $row=mysqli_fetch_array($res);
         if($row==0){
         ?>
         	<h1 class="text-center text-capitalize pt-5 pb-5" style="font-family: 'Helvetica', serif;">No Products are Selected</h1>
         <?php
     	}
         	else{
         		?>
         		<div class="col-12">
         		<h2 class="text-center text-capitalize pt-5 pb-5" style="font-family: 'Helvetica', serif;">Products in Cart</h2>
         		</div>
         		<?php
         		while($row=mysqli_fetch_array($res)){
         ?>
         <div class="col-sm-3 mb-4">
            <div class="card-mb-3" style="width:16rem;">
                <img src="<?php echo $row['Image']?>" class="card-img-top" alt="..."/>
                <div class="card-body">
                     <h5 class="card-title"><?php echo $row['Name']?></h5>
                     <p class="card-text">
                        <h4>Quantity:<?php echo $row['Quantity']?><br></h4>
                        	<h2>Rs.<?php echo $row['Price']?></h2>
                    </p>
                </div>
              </div>
         </div>
        <?php }
		} ?>
		</div>

		<div class="row">
			<div class="col-12">
			<?php
        		 $res=mysqli_query($conn,"select sum(Price*Quantity) as Totalcost from cart");	
        		 $row=mysqli_fetch_array($res);?>
        		 <h2 class="text-center text-capitalize pt-5 pb-5" style="font-family: 'Helvetica', serif;">Total Cost: Rs.<?php echo $row['Totalcost']?></h2>
        	</div>
        	<div class="col-12 text-center">
        	<form action="index.php">
				<input type="submit" class="btn btn-primary" value="Continue Shopping">
			</form>
		</div>
		</div>
</div>
</body>
</html>
