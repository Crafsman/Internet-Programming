<?php



// echo $_REQUEST['firstname'];
// echo $_REQUEST['email'];
// echo $_REQUEST['address'];
// echo $_REQUEST['city'];
// echo $_REQUEST['state'];
// echo $_REQUEST['country'];

echo "Your order is sent to: <b>".$_REQUEST['email']."</b> Please check it";

$msg = "Hello ".$_REQUEST['firstname'].","."This is your invoice.";
//echo $mgs;

mail($_REQUEST['email'],"purchase invoice",$msg);

?>