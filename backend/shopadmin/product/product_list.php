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
		<script language="javascript">
			function ConfirmDelete()
			{
				return confirm("Are you sure to delete this data?") ;	
			}
	
		</script>
		
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
					<li><a href="product_add.php">Add Products</a></li>
					<li class="active"><a href="product_list.php">List Products</a></li>
					
				  </ul>
			</div><!-- submenu -->
		</div>
		
		
		<div class="row">
			<!-- content -->
			<div class="col-md-10 col-md-offset-1 mybody">
					
					
				<h3> Product List </h3>
				<table class="table mytable">
					<tr>
						<th>ProductID</th>
						<th>ProductName </th>
						<th>Product_Image </th>
						<th>Shop_ID</th>
						<th>Manufacture</th>
						<th>Price</th>
						<th>Shop_ID</th>
					</tr>
					<?php
						
						
						$query3 = "select * from Product";                    
							
						$result3 =	oci_parse($conn, $query3);
						oci_execute($result3);
						$rowCount = 1;

						$query4 = "select * from Shop where USERNAME = '".$_SESSION['Shop']."'"; 
						
						$result4 =	oci_parse($conn, $query4);
						oci_execute($result4);
						$row4 = oci_fetch_assoc($result4);
							
						
						while($row3 = oci_fetch_assoc($result3))
						{	
								
							//if the shop id matches
							if($row3['SHOP_ID'] == $row4['USERNAME']){
								$idValue = $row3['PRODUCT_ID'];
								if($rowCount%2 != 0)
									echo "<tr>";
								else
									echo "<tr>";
								echo "<td>" . $rowCount . "</td>";
								echo "<td>" . $row3['PRODUCT_ID'] . "</td>";
								echo "<td>" . $row3['PRODUCT_NAME'] . "</td>";
								echo "<td><img src='" . $row3['PRODUCT_IMAGE'] . "' style='height:50px; width:50px' ></td>";
								echo "<td>" . $row3['SHOP_ID'] . "</td>";
								echo "<td>" . $row3['MANUFACTURER'] ."</td>";
								echo "<td>" . $row3['PRICE'] ."</td>";
								echo "<td><a href='product_edit.php?id=$idValue'> Edit </a></td>";                
								echo "<td><a href='product_delete.php?id=$idValue' onclick='return ConfirmDelete()'> Delete </a></td>";
								echo "</tr>";
								$rowCount++;
							}
						}	
					?> 
					
				</table>	
			</div><!-- content -->	
			
			
			<!--footer-->
			<div class="col-md-12 webbottom">
						
						
							<?php require "../footer.php"?>
						
				 
			</div>
		</div>
	</body>
</html>