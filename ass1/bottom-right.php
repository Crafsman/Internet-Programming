<?php
session_start();
echo $_SESSION["currentID"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\" />";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/bottom-right.css\" />";

?>
<button>Default Button</button>
<a href="#" class="button">Link Button</a>
<button class="button">Button</button>
<input type="button" class="button" value="Input Button">

<hr>

<div class="row">

<div class="col-25">
  <div class="container">
    <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4..</b></span></h4>
    <p><a href="#">Product 1</a> <span class="price">$15</span></p>
    <p><a href="#">Product 2</a> <span class="price">$5</span></p>
    <p><a href="#">Product 3</a> <span class="price">$8</span></p>
    <p><a href="#">Product 4</a> <span class="price">$2</span></p>
    <hr>
    <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
  </div>
</div>
</div>

</body>
</html>