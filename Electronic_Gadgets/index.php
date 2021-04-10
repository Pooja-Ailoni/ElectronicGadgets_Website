<?php
include 'config.php';
if(isset($_POST['cart'])) 
{
    $brand=$_POST['productname'];
    $image=$_POST['image'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $sql = "INSERT INTO cart(Image,Name,Price,Quantity) VALUES(?,?,?,?);";
    if($stmt = $conn->prepare($sql))
    {
    $stmt->bind_param("ssii",$image,$brand,$price,$quantity);
    $stmt->execute();
    }
    $stmt->close();
}
?>
<!doctype html>
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
 <section>
    <body style="background-color:white;" data-spy="scroll" data-target=".navbar" data-offset="50">
      <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#0b0c10">
          <a class="navbar-brand" href="#" style="font-family: 'Times New Roman', cursive";>
            <span style="color:#E9E9E9";>XYZ STORE</span></a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
           </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item"><a class="nav-link" href="#"style="font-family: 'Cinzel', serif;">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#Smartphones"style="font-family: 'Cinzel', serif;">Smartphones</a></li>
            <li class="nav-item"><a class="nav-link" href="#Laptops"style="font-family: 'Cinzel', serif;">Laptops</a></li>                        
            <li class="nav-item"><a class="nav-link" href="#TVs" style="font-family: 'Cinzel', serif;">TVs</a></li>
            <li class="nav-item"><a class="nav-link" href="#PowerBanks"style="font-family: 'Cinzel', serif;">PowerBanks</a></li> 
          </ul>
        <form method="post" action="updation.php">
            <input type="submit" value="update"/>
        </form>
      <div class="float-md-right">
        <form method="post" action="ShowCart.php">
            <img src="cart.png" height="40" width="40"/><input type="submit" style="border-radius:6px;padding:5px;margin: 4px 2px;text-align:center" name="showcart" value="Cart"/>       
        </form>
      </div>
      </div>
      </nav>
      </header>
    </section>
      <br>
      <hr>
      <section>
        <div class="container-fluid">
            <h1 class="text-center text-capitalize pt-5" style="font-family: 'Prata', serif;">Electronic Gadgets</h1>
            <hr class="w-25 mx-auto border-dark">
        </div>
    <br>
    <div id="Smartphones">
         <br>
    <div class="container-fluid">
        <h1 class="text-center text-capitalize pt-5 pb-5" style="font-family: 'Helvetica', serif;">SmartPhones</h1>
    </div>
    <div class="container-fluid">
     <div class="row">
        <?php
          $res=mysqli_query($conn,"select * from smartphone");
        while($row=mysqli_fetch_array($res)){?>
        <div class="col-sm-3 mb-4">
            <div class="card-mb-3" style="width: 18rem;">
                <img src="<?php echo $row['Image']?>" class="card-img-top" alt="..."/>
                <div class="card-body">
                     <h5 class="card-title"><?php echo $row['Brand']?></h5>
                     <p class="card-text">
                        <?php echo $row['Ram']?> Ram <?php echo $row['Storage']?> Storage</br>
                        <?php echo $row['Height']?> cms
                        <?php echo $row['Battery']?> battery life
                        <h2>Rs.<?php echo $row['Price']?></h2>
                    </p>
                    <form method="post" name="upload" action="index.php">
                        <input type="hidden" name="image"  value= "<?php echo $row['Image']?> ">
                        <input type="hidden" name="productname" value="<?php echo $row['Brand']?>">
                        <input type="hidden" name="price" value="<?php echo $row['Price']?>">
                        <input type="textbox" name="quantity" value="1">
                        </br></br>
                        <input type="submit" class="btn btn-primary" name="cart" value="Add to cart">
                    </form>
                </div>
            </div>
        </div>
         <?php } ?>
     </div>
    </div>
</div>
 <div id="Laptops">
         <br>
    <div class="container-fluid">
        <h1 class="text-center text-capitalize pt-5 pb-5" style="font-family: 'Helvetica', serif;">Laptops</h1>
    </div>
    <div class="container-fluid">
     <div class="row">
        <?php
          $res=mysqli_query($conn,"select * from laptop");
        while($row=mysqli_fetch_array($res)){?>
        <div class="col-sm-3 mb-4">
            <div class="card-mb-3" style="width: 18rem;">
                <img src="<?php echo $row['Image']?>" class="card-img-top" alt="..."/>
                <div class="card-body">
                     <h5 class="card-title"><?php echo $row['Brand']?></h5>
                     <p class="card-text">
                        <h4>
                            <?php echo $row['Processor']?> Processor</h4></br>
                            <?php echo $row['Ram']?> Ram <?php echo $row['Storage']?> Storage</br>
                        <?php echo $row['Height']?> inch   </h4>
                        <h2>Rs.<?php echo $row['Price']?></h2>
                    </p>
                    <form method="post" name="upload" action="index.php">
                        <input type="hidden" name="image"  value= "<?php echo $row['Image']?> ">
                        <input type="hidden" name="productname" value="<?php echo $row['Brand']?>">
                        <input type="hidden" name="price" value="<?php echo $row['Price']?>">
                        <input type="textbox" name="quantity" value="1">
                        </br></br>
                        <input type="submit" class="btn btn-primary" name="cart" value="Add to cart">
                    </form>
                </div>
            </div>
        </div>
         <?php } ?>
     </div>
    </div>
</div>
<div id="TVs">
         <br>
    <div class="container-fluid">
        <h1 class="text-center text-capitalize pt-5 pb-5" style="font-family: 'Helvetica', serif;">TVs</h1>
    </div>
    <div class="container-fluid">
     <div class="row">
        <?php
          $res=mysqli_query($conn,"select * from tv");
        while($row=mysqli_fetch_array($res)){?>
        <div class="col-sm-3 mb-4">
            <div class="card-mb-3" style="width: 18rem;">
                <img src="<?php echo $row['Image']?>" class="card-img-top" alt="..."/>
                <div class="card-body">
                     <h5 class="card-title"><?php echo $row['Brand']?></h5>
                     <p class="card-text">
                            Height:<?php echo $row['Height']?> cm   </br>
                            Sound Output:<?php echo $row['Sound']?>  </br>
                            Resolution: <?php echo $row['Resolution']?>  </br>
                        <h2>Rs.<?php echo $row['Price']?></h2>

                    </p>
                    <form method="post" name="upload" action="index.php">
                        <input type="hidden" name="image"  value= "<?php echo $row['Image']?> ">
                        <input type="hidden" name="productname" value="<?php echo $row['Brand']?>">
                        <input type="hidden" name="price" value="<?php echo $row['Price']?>">
                        <input type="textbox" name="quantity" value="1">
                        </br></br>
                        <input type="submit" class="btn btn-primary" name="cart" value="Add to cart">
                    </form>
                </div>
            </div>
        </div>
         <?php } ?>
     </div>
    </div>
</div>
<div id="PowerBanks">
         <br>
    <div class="container-fluid">
        <h1 class="text-center text-capitalize pt-5 pb-5" style="font-family: 'Helvetica', serif;">PowerBanks</h1>
    </div>
    <div class="container-fluid">
     <div class="row">
        <?php
          $res=mysqli_query($conn,"select * from powerbank");
        while($row=mysqli_fetch_array($res)){?>
        <div class="col-sm-3 mb-4">
            <div class="card-mb-3" style="width: 18rem;">
                <img src="<?php echo $row['Image']?>" class="card-img-top" alt="..."/>
                <div class="card-body">
                     <h5 class="card-title"><?php echo $row['Brand']?></h5>
                     <p class="card-text">
                            <?php echo $row['Power']?>Fast Charging  </br>
                           <?php echo $row['Battery']?>  </br>
                        <h2>Rs.<?php echo $row['Price']?></h2>

                    </p>
                    <form method="post" name="upload" action="index.php">
                        <input type="hidden" name="image"  value= "<?php echo $row['Image']?> ">
                        <input type="hidden" name="productname" value="<?php echo $row['Brand']?>">
                        <input type="hidden" name="price" value="<?php echo $row['Price']?>">
                        <input type="textbox" name="quantity" value="1">
                        </br></br>
                        <input type="submit" class="btn btn-primary" name="cart" value="Add to cart">
                    </form>
                </div>
            </div>
        </div>
         <?php } ?>
     </div>
    </div>
</div>

</section>
</body>

</html>