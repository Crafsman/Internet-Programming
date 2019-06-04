
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
require_once 'Zend/Json.php';

$_SESSION["products"] = Zend_Json::decode( $_REQUEST['products']);

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

