<?php require '../session.php'; ?>
<?php require '../connection.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Bishal bazaar - shop online! </title>
		<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="../../js/jquery.min.js"></script>
		<!-- JavaScript Includes -->
		<script src="../../js/transition.js"></script>
		<script src="../../js/dropdown.js"></script>
		<script src="../../js/collapse.js"></script>
		<!-- Custom Theme files -->
		<!--theme-style-->
		<link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />	
		<link href="../../css/animate.css" rel="stylesheet" type="text/css"  media="all" />
		<!--//theme-style-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Shop online kathmandu e-commerce bishal bazaar clothes shoes watches phones mobile tv " />
		
		
	</head>
	<body>
		
		
		<?php require "../header.php"; ?>
		
		<div class="row">
			<a href="" style="margin-top:1%; margin-left:1%;">
				<!--logo-->
				<div class="logo animated bounceInLeft">
					<!-- Logo and search button animated-->
					<a href="index.php"><img src="../../images/logo.png" alt="" /></a>				
				</div><!--logo-->
			</a>	
			<!-- submenu -->
			<div class="col-md-8 submenu">
				<ul class="nav navbar-nav">
					<li></li>
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
					
				  </ul>
			</div><!-- submenu -->
		</div>
		
		
		<div class="row">
			<!-- content -->
			<div class="col-md-10 col-md-offset-1 mybody">
					<h3>Your Order</h3>	
				<?php
					echo '<h3> Cart Item List </h3>';
						echo '<table class="table mytable">';
							echo '<tr>';
								echo '<th>S.N.</th>';
								echo '<th>Customer Username</th>';
								echo '<th>Product ID</th>';
								echo '<th>Product Name</th>';
								echo '<th>Product Image Name</th>';
								echo '<th>Manufacturer</th>';
								echo '<th>Price</th>';
								echo '<th>Quantity</th>';
							echo '</tr>';
							
							
									require "../connection.php";
									$query9 = "select * from CUSTOMERORDER";                    
										
									$result9 =	oci_parse($conn, $query9);
									oci_execute($result9);
									$rowCount = 1;	
									
									while($row9 = oci_fetch_assoc($result9))
									{	
											
											if($row9['SHOP_ID'] == $_SESSION['Shop']){
												if($rowCount%2 != 0)
													echo "<tr>";
												else
													echo "<tr>";
												echo "<td>" . $rowCount . "</td>";
												echo "<td>" . $row9['CUSTOMER_USERNAME'] . "</td>";
												echo "<td>" . $row9['PRODUCT_ID'] . "</td>";
												echo "<td>" . $row9['PRODUCT_NAME'] . "</td>";
												echo "<td><img src='" . $row9['PRODUCT_IMAGE'] . "' height='70px' width='70px'/></td>";
												echo "<td>" . $row9['MANUFACTURER'] . "</td>";
												echo "<td>" . $row9['PRICE'] . "</td>";
												echo "<td>" . $row9['QUANTITY'] ."</td>";            
												echo "</tr>";
												$rowCount++;
											}
									} 
						echo '</table>';
				?>
			</div><!-- content -->	
			
			
			<!--footer-->
			<div class="col-md-12 webbottom">
						
						
							<?php require "../footer.php"?>
						
				 
			</div>
		</div>
	</body>
</html>
