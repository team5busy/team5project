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
						<h3>Shops</h3>
						<p>Select a shop to display the products</p>
					</div>	
				<?php 
					require "connection.php";
						$query3 = "select * from SHOP where CATEGORY_ID =".$_REQUEST['id'].""; 
							$result3 =	oci_parse($conn, $query3);
							oci_execute($result3);
							$rowCount = 1;
							echo '<div class="col-md-9 ">';
								echo '<form method="post"  enctype="multipart/form-data" class="myform">';
									echo '<table class="table table-striped">';
										echo '<tr>';
											echo '<th>S.N.</th>';
											echo '<th>Shop Name</th>';
											echo '<th> Floor Number</th>';
											echo '<th>Category</th>';
										echo '</tr>';
										while($row3 = oci_fetch_assoc($result3))
										{	
											echo '<a href="shopitems.php?id=$idValue">';
											echo '<tr>';
													$idValue = $row3['USERNAME'];
												
														
															echo '<td class="categoryform"><a href="shopitems.php?id='.$idValue.'"><h3> '.$rowCount.'</td></a></h3>';
															echo '<td class="categoryform"><a href="shopitems.php?id='.$idValue.'"><h3> '.$row3['SHOP_NAME'].'</td></a></h3>';
															echo '<td class="categoryform"><a href="shopitems.php?id='.$idValue.'"><h3>'.$row3['FLOOR_NO'].'</td></a></h3>';
															echo '<td class="categoryform"><a href="shopitems.php?id='.$idValue.'"><h3 >';
															
															$query4 = "select * from CATEGORY where CATEGORY_ID =".$row3['CATEGORY_ID'].""; 
															$result4 =	oci_parse($conn, $query4);
															oci_execute($result4);
															while($row4 = oci_fetch_assoc($result4))
															{
																echo $row4['CATEGORY_NAME'];	
															}
															echo '</td></a></h3>';
														
											echo '</tr>';
											echo '</a>';
											$rowCount= $rowCount++;
										}
									echo "</table>";
								echo '</form>';
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