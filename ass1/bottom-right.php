<?php
session_start();

if ($_REQUEST["clear"] == 1) {
  unset ($_SESSION['products']);
  unset($_SESSION["currentProduct"]);
}
if(isset($_SESSION["currentProduct"])){
  $_SESSION["products"][] = $_SESSION["currentProduct"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php 
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\" />";
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/bottom-right.css\" />";
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mystyle.css\" />";
    ?>
</head>
<body>


<div class="linkbtn">
	<a href="bottom-right.php?clear=1"   target="bottom-right" type="button" >
	Clear
	</a>
</div>



<hr>

<div class="row">

<div class="col-25" >
  <div class="container">
    <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i><b><?php echo count($_SESSION["products"]);?></b></span></h4>
  
  
  <?php 
    foreach($_SESSION["products"] as $product){ ?>
      <p><a href="#"><?php echo $product["product_name"];?></a><span class="price">$<?php echo $product["unit_price"];?></span></p>
  <?php } ?>

    <hr>

    <p>Total <span class="price" style="color:black"><b>$
    <?php
    $total = 0;
    foreach($_SESSION["products"] as $product){
      $total += $product["unit_price"];
    }
    echo $total;
    ?></b></span></p>
  </div>
</div>
</div>

</body>
</html>