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
				<!---->
				<div class="in-line">
					<div class="para-all-in">
						<h3>Items</h3>
						<p>Check our all latest products in this section.</p>
					</div>
					<div class="lady-on">
						
						<?php
							$query3 = "select * from PRODUCT where SHOP_ID= '".$_REQUEST['id']."'";                    
							
							$result3 =	oci_parse($conn, $query3);
							oci_execute($result3);
							$rowCount = 1;
							while($row3 = oci_fetch_assoc($result3))
							{
								echo '<div class="col-md-4 itembind">';
									echo '<a ><img class="img-responsive pic-in" src="admin/customer/'.$row3['PRODUCT_IMAGE'].'" alt=" " ></a>';
									
									echo '<p>'.$row3['PRODUCT_NAME'].'</p>';
									echo '<span>NRs. '.$row3['PRICE'].'  | <label class="cat-in"> </label>';
									if(isset($_SESSION['Customer'])){
										echo '<a href="productdetails.php?id='.$row3['PRODUCT_ID'].'">Add to Cart </a>';
									}
									else{
										echo '<a href="login.php?shopitemsid='.$_REQUEST['id'].'">Add to Cart </a>';
									}
									echo '</span>';
								echo '</div>';
							}
						?>
						<div class="clearfix"> </div>
					</div>
				</div>
		
		
		
		
		
		
		
	</div><!--content-->
	<!---->
	
	<!--footer-->
	<?php require "footer.php";?>
	<!--footer-->
	
</body>
</html>