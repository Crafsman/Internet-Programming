<?php

echo "Your order is sent to: <b>".$_REQUEST['email']."</b> Please check it";

$msg = "Hello ".$_REQUEST['firstname'].","."This is your invoice.";

mail($_REQUEST['email'],"purchase invoice",$msg);

?>