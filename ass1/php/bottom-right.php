<?php

session_start();

if ($_REQUEST["clear"] == 1) {
  unset($_SESSION["currentProduct"]);
  unset($_SESSION['showCheckout']);
  unset($_SESSION['itmes']);
}
if(isset($_SESSION["currentProduct"]) && $_REQUEST["quantity"] > 0){

  if (!isset($_SESSION["itmes"])) {  
 
      $id = $_SESSION["currentProduct"][product_id];
      $_SESSION["itmes"][$id][product_id] = $_SESSION["currentProduct"][product_id];
      $_SESSION["itmes"][$id][product_name] = $_SESSION["currentProduct"][product_name];
      $_SESSION["itmes"][$id][unit_price] = $_SESSION["currentProduct"][unit_price];
      $_SESSION["itmes"][$id][unit_quantity] = $_SESSION["currentProduct"][unit_quantity];
      $_SESSION["itmes"][$id][quantity] = $_REQUEST["quantity"];

  }else
  {
    $serchid = $_SESSION["currentProduct"][product_id];
    $find = 0;

      foreach ($_SESSION["itmes"] as $item) {
        if ($item["product_id"] == $serchid) {    
          //Update quntity
          $_SESSION["itmes"][$serchid][quantity] = $_REQUEST["quantity"];
          $t = $_SESSION["itmes"][$serchid][quantity];

          $find = 1;
          break;
        }

      }

      if ($find == 0) {
        $id = $_SESSION["currentProduct"][product_id];  
        $_SESSION["itmes"][$id][product_id] = $_SESSION["currentProduct"][product_id];
        $_SESSION["itmes"][$id][product_name] = $_SESSION["currentProduct"][product_name];
        $_SESSION["itmes"][$id][unit_price] = $_SESSION["currentProduct"][unit_price];
        $_SESSION["itmes"][$id][unit_quantity] = $_SESSION["currentProduct"][unit_quantity];
        $_SESSION["itmes"][$id][quantity] = $_REQUEST["quantity"];
       // echo "new id is:".$id."<br>";
      }

      $number = 0;
      foreach ($_SESSION["itmes"] as $item){
       // echo $item[product_id]."...$item[quantity]"."</br>";
        $number += $item[quantity];
      }
    }

} 
      $total_number = 0;
      foreach ($_SESSION["itmes"] as $item){
        $total_number += $item[quantity];
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
    echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>";
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\" />";
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/bottom-right.css\" />";
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/mystyle.css\" />";
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<div id="info-banner" style="display:none" class="alert alert-info">
  <strong>Note:</strong> No items! 
  <br>Click 'CHECKOUT' button to hide this information.
</div>

<a href="bottom-right.php?clear=1" target="bottom-right" class="button button_red" style="float:right">CLEAR</a>
<a href="top-right.php?showcheckoutForm=1" target="top-right" class="button" id="checkout-btn">CHECKOUT</a>
<hr>

<div class="row">
<div class="col-25" >
  <div class="container">
    <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i><b id='number-itmes'><?php echo $total_number;?></b></span></h4>
  
  <?php 
    foreach($_SESSION["itmes"] as $product){ ?>
      <p><a href="#"><?php echo $product["product_name"];?></a> * <?php echo $product["quantity"];?><span class="price">$<?php echo $product["unit_price"]*$product["quantity"];?></span></p>
  <?php } ?>

    <hr>

    <p>Total <span class="price" style="color:black"><b>$
    <?php
    $total = 0;
    foreach($_SESSION["itmes"] as $product){
      $total += $product["unit_price"]*$product["quantity"];
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

            
    } else {

    }
  }
</script>
</body>
</html>