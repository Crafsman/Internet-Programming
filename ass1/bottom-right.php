<?php

session_start();


if ($_REQUEST["clear"] == 1) {
  unset($_SESSION['products']);
  unset($_SESSION["currentProduct"]);
  unset($_SESSION['showCheckout']);
  //unset($_SESSION['items']);
}
if(isset($_SESSION["currentProduct"])){
  $number = $_REQUEST["quantity"];
  for ($i=0; $i < $number ; $i++) { 
    $_SESSION["products"][] = $_SESSION["currentProduct"];
  }
  

  // if (!isset($_SESSION["products"])) {
  //   // First time 
  //   $_SESSION["products"][] = $_SESSION["currentProduct"];
  // }else{
  //   // Find same product
  //   foreach ($_SESSION["products"] as $product) {
  //     if ($product[product_id] == $_SESSION["currentProduct"][product_id]) {
        
  //       $product[product_id][quantity] = $_REQUEST["quantity"];
  //       echo "find it, change quantity is: ".$product[product_id][quantity];
  //       break;
  //     }else{
  //       //not find add new
  //       echo "add new";
  //       $_SESSION["products"][] = $_SESSION["currentProduct"];
  //       break;

  //     }
      
  //   }

  // }
  


  } 

  // echo "objects: ".count($_SESSION["items"]);
  // echo "<br>";
  // echo "***";
  // $number = 0;
  // //Echo total items
  // foreach ($_SESSION["items"] as $item) {
  //   $number += $item->$quantity;

  // }
  // echo $number;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php 
    echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>";
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\" />";
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/bottom-right.css\" />";
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mystyle.css\" />";
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<div id="info-banner" style="display:none" class="alert alert-info">
  <strong>Info!</strong> No items! 
  <br>Click 'CHECKOUT' button to hide this info.
</div>

<a href="bottom-right.php?clear=1" target="bottom-right" class="button button_red" style="float:right">CLEAR</a>
<a href="top-right.php" target="top-right" class="button" id="checkout-btn">CHECKOUT</a>
<hr>

<div class="row">
<div class="col-25" >
  <div class="container">
    <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i><b id='number-itmes'><?php echo count($_SESSION["products"]);?></b></span></h4>
  
  <?php 
    foreach($_SESSION["products"] as $product){ ?>
      <p><a href="#"><?php echo $product["product_name"];?></a> * 1<span class="price">$<?php echo $product["unit_price"];?></span></p>
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


<script>

	document.getElementById("checkout-btn").onclick=checkout;

function checkout() {	
  //check out total count. If total count is 0, show info banner, otherwise target to right-top ifram
  var number = document.getElementById("number-itmes").innerHTML;
  if (number == 0) 
  {
    //show
    var popup = document.getElementById("info-banner");
    popup.classList.toggle("show");
    <?php 
    $_SESSION['showCheckout'] = 0;
    unset($_SESSION['showCheckout']);
    ?>
    
    
  } else {
    <?php 
    $_SESSION['showCheckout'] = 1;
    ?>

  }
}
</script>
</body>
</html>