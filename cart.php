<?php 
	session_start();?>
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
						<h3>Shops</h3>
						<p>Select a shop to display the products</p>
					</div>	
			
					<?php 
				
					
					
					//display cart side
					echo '<div class="col-md-9 itemform">';
					
						echo '<h3> Cart Item List </h3>';
						echo '<table class="table mytable">';
							echo '<tr>';
								echo '<th>S.N.</th>';
								echo '<th>Product Name</th>';
								echo '<th>Product Image</th>';
								echo '<th>Shop Id</th>';
								echo '<th>Manufacturer</th>';
								echo '<th>Price</th>';
								echo '<th>Quantity</th>';
							echo '</tr>';
							
									require "connection.php";
									$query9 = "select * from CART where CUSTOMER_ID = '".$_SESSION['Customer']."'";
									$result9 =	oci_parse($conn, $query9);
									oci_execute($result9);
									$rowCount = 1;	
									
									while($row9 = oci_fetch_assoc($result9))
									{	
											
										
											$idValue = $row9['PRODUCT_ID'];
											if($rowCount%2 != 0)
												echo "<tr>";
											else
												echo "<tr>";
											echo "<td>" . $rowCount . "</td>";
											echo "<td>" . $row9['PRODUCT_NAME'] . "</td>";
											echo "<td><img src='test/admin/" . $row9['PRODUCT_IMAGE'] . "' height='70px' width='70px'/></td>";
											echo "<td>" . $row9['SHOP_ID'] . "</td>";
											echo "<td>" . $row9['MANUFACTURER'] . "</td>";
											echo "<td>" . $row9['PRICE'] ."</td>";
											echo "<td>" . $row9['QUANTITY'] ."</td>";              
											echo "<td><a href='cart_delete.php?id=$idValue'><button type='button' class='close' aria-label='Close'><span aria-hidden='true'>&times;</span></button> </a></td>";
											echo "</tr>";
											$rowCount++;
										
									} 
						echo '</table>';
						
						echo '<a href="paypal.php"><div class="form-in">';
						echo '<input name="btncart" class="btn" type="button" value="Buy">';
						echo '</div></a>';
						echo '<div style="height:200px;">';
						
						echo '</div>';
					echo '</div>';
				?>
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