

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Bootstrap E-commerce Templates</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->

		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<script src="themes/js/jquery.redirect.js"></script>
		<script src="themes/js/jquerysession.js"></script>
	</head>
    <body>
		<?php

			session_start();

			$cars = $_REQUEST['arg1'];		

			$_SESSION['favcolor'] = 'green';

			?>

		<div id="top-bar" class="container">
			<div class="row">
			<div align="center" class="span12">
				<h1> Car Rental Center</h1>
			</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			
			<section class="main-content">				
				<div class="row">
					<div class="span9">					
						<h4 class="title"><span class="text"><strong>Your</strong> Cart</span></h4>
						<table class="table table-striped">
							<thead>
								<tr>									
									<th>Thumbnail</th>
									<th>Vehicle</th>
									<th>Rental Days</th>
									<th>Unit Price</th>							
									<th>Remove</th>
								</tr>
							</thead>
							<tbody id="tbody">

							</tbody>
						</table>

						<hr>
						<p class="cart-total right">
							<strong>Sub-Total</strong>:	$100.00<br>
							<strong>Eco Tax (-2.00)</strong>: $2.00<br>
							<strong>VAT (17.5%)</strong>: $17.50<br>
							<strong>Total</strong>: $119.50<br>
						</p>
						<hr/>
						<p class="buttons center">				
							<button class="btn btn-inverse" type="submit" id="checkout">Checkout</button>
						</p>					
					</div>

				</div>
			</section>			

			<section id="copyright">
				<span>Copyright 2019 Hertz-UTS All right reserved.</span>
			</section>
		</div>

		<script src="themes/js/common.js"></script>
		<script src="themes/js/cart.js"></script>	
    </body>
</html>