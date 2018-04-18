<?php

if (isset($_REQUEST['data'])) {
	// If receive products ID then, retrive this ID in database
	$ID = $_REQUEST['data'];
	
	//Procedural style
	$connection = mysqli_connect('rerun', 'potiro', 'pcXZb(kL', 'poti');

	$query_string = "select * from products where (product_id = $ID)";
	 
	$result=mysqli_query($connection,$query_string);
	 
	$num_rows=mysqli_num_rows($result);

	if ($num_rows > 0 ) {
		print "<table border='1'>";
		if ( $a_row = mysqli_fetch_array($result)){
			
			print "<br>";
			
			{
				echo $a_row[product_id]."<br>";
				echo $a_row[product_name]."<br>";
				echo $a_row[unit_price]."<br>";
				echo $a_row[unit_quantity]."<br>";
				echo $a_row[in_stock]."<br>";
				
			}
			//  print "<tr>\n";
			//  foreach ($a_row as $field)
			// 	 print "\t<td>$field</td>\n";
			//  print "</tr>";
		}
		print "</table>";


		// display a button here ?
		print "<button type=\"button\" style=\"position:absolute;bottom:8px;right:16px;font-size:18px;background-color:#4CAF50;\">Add</button>";
	}
	mysqli_close($link);



	
} else {
	echo "No data sent to this page.";
}


?>