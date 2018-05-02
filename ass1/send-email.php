<?php

echo "test";

echo $_REQUEST['firstname'];
echo $_REQUEST['email'];
echo $_REQUEST['address'];
echo $_REQUEST['city'];
echo $_REQUEST['state'];
echo $_REQUEST['country'];





//echo $mgs;

mail($_REQUEST['email'],"purchase invoice","test");

?>