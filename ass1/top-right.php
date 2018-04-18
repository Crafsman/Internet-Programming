<?php

if (isset($_REQUEST['data'])) {
	// If receive products ID then, retrive this ID in database
	$ID = $_REQUEST['data'];
	
	//Procedural style
	$connection = mysqli_connect('rerun', 'potiro', 'pcXZb(kL', 'poti');

	$query_string = "select * from films where (product_id = $ID)";
	 
	$result=mysqli_query($connection,$query_string);
	 
	$num_rows=mysqli_num_rows($result);
	if ($num_rows > 0 ) {
		print "<table border='0'>";
		while ( $a_row = mysqli_fetch_array($result)){
			 print "<tr>\n";
			 foreach ($a_row as $field)
				 print "\t<td>$field</td>\n";
			 print "</tr>";
		}
		print "</table>";
	}
	mysqli_close($link);



	
} else {
	echo "No data sent to this page.";
}


?>