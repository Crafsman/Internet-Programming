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

 echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mystyle.css\" />"; 

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
				// talbe 
				echo "<table id='customers'>";
				echo "<tr>\n";
				echo "<th>product_id</th>";
				echo "<th>product_name</th>";
				echo "<th>unit_price</th>";
				echo "<th>unit_quantity</th>";
				echo "<th>in_stock</th>";
				echo "</tr>";

				echo "<tr>\n";
				echo "<td>$a_row[product_id]</td>";
				echo "<td>$a_row[product_name]</td>";
				echo "<td>$a_row[unit_price]</td>";
				echo "<td>$a_row[unit_quantity]</td>";
				echo "<td>$a_row[in_stock]</td>";
				echo "</tr>";

				echo "</table>";

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


<!-- <p id="demo"></p>
<script>
	var counter = 0;
	document.getElementById("addbtn").onclick=myFunction;

	function myFunction() {	
		counter+=1;
		document.getElementById("demo").innerHTML = counter; 
	}
</script> -->


</body>
</html>

