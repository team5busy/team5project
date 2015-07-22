<?php


session_start();

/*extract() function imports variables into 
the local symbol table from an array*/
extract($_GET);
include "connection.php"; 

	/* initializing the variables */
	$st = 0; $t = 0; 
	$p = 0; $q = 0; $tq = 0;
	$query = "SELECT PRICE, QUANTITY FROM CART where CUSTOMER_ID = '".$_SESSION['Customer']."' ";
	$result  = oci_parse($conn, $query);
	oci_execute($result);
	while($row = oci_fetch_array($result)){
		$p = $row['PRICE'];
		$p = (int)($p);
		$q = $row['QUANTITY'];
		$q = (int)($q);
		$st = $p * $q;
		$t += $st;
		$tq += $q; 
	}


$parseQuery = "SELECT * FROM Customer WHERE Username = '".$_SESSION['Customer']."'";
$queryResult = oci_parse($conn, $parseQuery);
oci_execute($queryResult);
$rs = oci_fetch_array($queryResult);
$eId = $rs['EMAIL']; // extracting user email id for paypal
?>
<!DOCTYPE html>
<html>
<head>
<title>Bishal Bazaar | Home </title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/transition.js"></script>
<script src="js/dropdown.js"></script>
<script src="js/collapse.js"></script>

<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/styleedit.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/animate.css" rel="stylesheet" type="text/css"  media="all" />	
<style>
	#paypal{
		width: 100%;
		padding-left: 25px;
		margin-bottom: 14px;
	}
	#checkout_box{
		height: 43px;
	}
	.update{
		border-color: #CCC !important;
		border-radius: 0px;
		color: #FFF;
		margin-top: 18px;
		border: medium none;
		padding: 5px 15px;
	}
</style>	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Fashion Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
</head>
<body> 
	<!--header-->
		<?php require "header.php"; ?>
	<!--header-->	
		
	<!--content-->
	<div class="content">
			
		<div class="container">
			<div class="  col-m-on">
				
				<div class="in-line">
					<div class="para-all-in">
						<h3>PayPal</h3>
						<p>Note: First make order. Then, Make payment through PayPal.</p>
					</div>	
			
					<div class="col-sm-6">
						<div class="total_area">
							<img id="paypal" src="images/checkout/paypalfinal.jpg" alt="Paypal">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="total_area">
							<ul style="padding-left: 23px !important;">
								<li>Cart Sub Total <span><?php echo "$".$t; ?></span></li>
								<li>Eco Tax <span>$2</span></li>
								<li>Shipping Cost <span>Free</span></li>
								<li>Total Cost <span><?php echo "$".($t+2); ?></span></li>
								<li>Total Quantity <span><?php echo $tq; ?></span></li>
							</ul>
							 <?php if(!isset($_REQUEST['disableid'])){ echo '
								<form method="POST">
									<div class="form-in" style="margin-top:0px;margin-left:1%;margin-top:1%;">
										<a class="btn " href="makeorder.php">Order</a>
									</div>
								</form>
							';}?>
							<a class="" style="float:right;">
								<!-- 
								Adding PayPal Checkout to my 3rd-party Shopping Cart 
								-->
								<!-- $eId = user email id -->
								<!-- $t = total cost -->
								<!-- $tq = total quantity -->
								<!-- 2 is added for tax -->
								<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
									<input type="hidden" name="cmd" value="_xclick">
									<input type="hidden" name="business" value="<?=$eId;?>"> 
									<input type="hidden" name="item_name" value="ShopName">
									<input type="hidden" name="item_number" value="cartid"> 
									<input type="hidden" name="amount" value="<?=$t+2;?>"> 
									<input type="hidden" name="quantity" value="<?=$tq;?>">
									<input type="hidden" name="no_shipping" value="0">
									<input type="hidden" name="no_note" value="5">
									<input type="hidden" name="currency_code" value="USD">
									<input type="hidden" name="lc" value="AU">
									<input type="hidden" name="bn" value="PP-BuyNowBF">
									<input type="image" src="images/checkout/checkoutpp.png" border="0" name="submit" 
									alt="PayPal - The safer, easier way to pay online." id="checkout_box">
								</form>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
			
	</div><!--content-->
	<!---->
	
	<!--footer-->
	<?php require "footer.php";?>
	<!--footer-->
	
</body>
</html>