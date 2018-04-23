<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<?php echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mystyle.css\" />"; ?>
</head>
<body>



<?php



	if (isset($_REQUEST['data'])) {
		// If receive products ID then, retrive this ID in database
		$ID = $_REQUEST['data'];
	
		// Store current product ID in session;
		$_SESSION["currentID"] = $ID;
		
		//Procedural style
		$connection = mysqli_connect('rerun', 'potiro', 'pcXZb(kL', 'poti');
	
		$query_string = "select * from products where (product_id = $ID)";
		 
		$result=mysqli_query($connection,$query_string);
		 
		$num_rows=mysqli_num_rows($result);
	
		if ($num_rows > 0 ) {
			
			if ( $a_row = mysqli_fetch_array($result))
			{	
				print "<br>";		
				
				echo $a_row[product_id]."<br>";
				echo $a_row[product_name]."<br>";
				echo $a_row[unit_price]."<br>";
				echo $a_row[unit_quantity]."<br>";
				echo $a_row[in_stock]."<br>";				
				
				
				$_SESSION["currentProduct"] = $a_row;
		
				
			}
		}
		mysqli_close($link);
	
	
	
	} else {
		echo "No data sent to this page.";
	}


?>

<div class="linkbtn">
	<a href="bottom-right.php"  id="addbtn" target="bottom-right" type="button" class="add-button">
	ADD
	</a>
</div>


<p id="demo"></p>
<p id="demo1"></p>
<script>
	var counter = 0;
	document.getElementById("addbtn").onclick=myFunction;

	function myFunction() {	
		counter+=1;
		document.getElementById("demo").innerHTML = counter; 

	}
</script>


</body>
</html>

