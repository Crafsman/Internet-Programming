
<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Send Email</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="themes/js/jquery-1.7.2.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="themes/js/superfish.js"></script>
	<script src="themes/js/jquery.scrolltotop.js"></script>
	<script src="themes/js/jquery.redirect.js"></script>
	<script src="themes/js/jquerysession.js"></script>
</head>

<body>

<?php

function fromJSON ( $json, $assoc = false ) {

    /* by default we don't tolerate ' as string delimiters
       if you need this, then simply change the comments on
       the following lines: */
  
    // $matchString = '/(".*?(?<!\\\\)"|\'.*?(?<!\\\\)\')/';
    $matchString = '/".*?(?<!\\\\)"/';
    
    // safety / validity test
    $t = preg_replace( $matchString, '', $json );
    $t = preg_replace( '/[,:{}\[\]0-9.\-+Eaeflnr-u \n\r\t]/', '', $t );
    if ($t != '') { return null; }
  
    // build to/from hashes for all strings in the structure
    $s2m = array();
    $m2s = array();
    preg_match_all( $matchString, $json, $m );
    foreach ($m[0] as $s) {
      $hash       = '"' . md5( $s ) . '"';
      $s2m[$s]    = $hash;
      $m2s[$hash] = str_replace( '$', '\$', $s );  // prevent $ magic
    }
    
    // hide the strings
    $json = strtr( $json, $s2m );
    
    // convert JS notation to PHP notation
    $a = ($assoc) ? '' : '(object) ';
    $json = strtr( $json, 
      array(
        ':' => '=>', 
        '[' => 'array(', 
        '{' => "{$a}array(", 
        ']' => ')', 
        '}' => ')'
      ) 
    );
    
    // remove leading zeros to prevent incorrect type casting
    $json = preg_replace( '~([\s\(,>])(-?)0~', '$1$2', $json );
    
    // return the strings
    $json = strtr( $json, $m2s );
  
    /* "eval" string and return results. 
       As there is no try statement in PHP4, the trick here 
       is to suppress any parser errors while a function is 
       built and then run the function if it got made. */
    $f = @create_function( '', "return {$json};" );
    $r = ($f) ? $f() : null;
  
    // free mem (shouldn't really be needed, but it's polite)
    unset( $s2m ); unset( $m2s ); unset( $f );
  
    return $r;
  }

$_SESSION["products"] = fromJSON($_REQUEST['products'], true);

echo "Your order is sent to: <b>".$_REQUEST['email']."</b> Please check it."."<br>";

$message = "Thanks for renting cars from Hertz_UTS, the total price is:  $".$_REQUEST['overallMoney'];
$message .= "<br>";
$message .= "<br>";
$message .= "Details are as follows:";
$message .= "<br><br><br>";

$carsInXML = simplexml_load_file('files/cars.xml') or die("Failed to load");

for ($i = 0; $i < count($_SESSION["products"]); $i++) {
    $productID = $_SESSION["products"][$i]['id'];
    $quantity = $_SESSION["products"][$i]['quantity'];

    foreach($carsInXML->children() as $empl)
     {  
        if ($empl->ProductID == $productID) 
        {
            $message .= "*************************************************************";
            $message .= "<br>";
            $message .= "Model: ".$empl->Brand."-".$empl->Model."-".$empl->Model_year;
            $message .= "<br>";
            $message .= "mileage: " .$empl->Mileage;
            $message .= "<br>";
            $message .= "fuel_type: " .$empl->Fuel_type;
            $message .= "<br>";
            $message .= "seats: " .$empl->Seats;
            $message .= "<br>";
            $message .= "price_per_day: " .$empl->Price_per_day;
            $message .= "<br>";
            $message .= "rent_day: " .$quantity;
            $message .= "<br>";
            $message .= "description: " .$empl->Description;
            $message .= "<br>";
        }          

       }   
       $message .= "<br>";  
}

 echo $message;
 mail($_REQUEST['email'],"Hertz-UTS Invoice", $message);
?>

</body>

</html>

