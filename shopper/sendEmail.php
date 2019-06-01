

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

print_r($_REQUEST['products'] );

$ids = $_REQUEST['selectedCarsID'];
$reservationCarsID = explode(",", $ids);


echo "Your order is sent to: <b>".$_REQUEST['email']."</b> Please check it."."<br>";

$msg = "Thanks for renting cars from Hertz_UTS, the total price is:  $".$_REQUEST['overallMoney'];
$msg .= "<br>";
$msg .= "<br>";
$msg .= "Details are as follows:";
$msg .= "<br>";
$msg .= "<br>";

$xmldata = simplexml_load_file('files/cars.xml') or die("Failed to load");

 for ($i=0; $i <count($reservationCarsID) ; $i++) 
 { 

    foreach($xmldata->children() as $empl)
     {  
        if ($empl->ProductID == $reservationCarsID[$i]) 
        {
            $msg .= "---------------------------------------";
            $msg .= "<br>";
            $msg .= "Model: ".$empl->Brand."-".$empl->Model."-".$empl->Model_year;
            $msg .= "<br>";
            $msg .= "mileage: " .$empl->Mileage;
            $msg .= "<br>";
            $msg .= "fuel_type: " .$empl->Fuel_type;
            $msg .= "<br>";
            $msg .= "seats: " .$empl->Seats;
            $msg .= "<br>";
            $msg .= "price_per_day: " .$empl->Price_per_day;
            $msg .= "<br>";
            $msg .= "description: " .$empl->Description;
            $msg .= "<br>";
        }          

       }       
       $msg .= "<br>";
}   

echo $msg;
mail($_REQUEST['email'],"purchase invoice",$msg);

?>

</body>

<script>
               
 console.log(JSON.parse($.session.get("overAllMoney")));
 var selectedCars = JSON.parse($.session.get("products"));
 console.log( selectedCars);
 </script>
</html>

