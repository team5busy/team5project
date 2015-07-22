<?php require '../session.php'; ?>
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
		
		
		<!--Header -->
		<?php require "../header.php"; ?><!--//Header -->
		
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
					<li><a href="shop_add.php">Add Shop</a></li>
					<li class="active"><a href="shop_list.php">List Shop</a></li>
					
				  </ul>
			</div><!-- submenu -->
		</div>
		
		
		<div class="row">
			<!-- content -->
			<div class="col-md-10 col-md-offset-1 mybody myform">
			
			
				
				<h3> List Shop </h3>
				<table class="table mytable">
					<tr>
						<th>S.N.</th>
						<th>Username</th>
						<th>Password</th>
						<th>Shop Name</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Floor number</th>
					</tr>
					<?php
						require "../connection.php";
						$query = "select * from shop";                    
							
						$result =	oci_parse($conn, $query);
						oci_execute($result);
						$rowCount = 1;	
						
						while($row = oci_fetch_assoc($result))
						{
							$idValue = $row['USERNAME'];
							if($rowCount%2 != 0)
								echo "<tr>";
							else
								echo "<tr>";
							echo "<td>" . $rowCount . "</td>";
							echo "<td>" . $row['USERNAME'] . "</td>";
							echo "<td>" . $row['PASSWORD'] . "</td>";
							echo "<td>" . $row['SHOP_NAME'] . "</td>";
							echo "<td>" . $row['KEEPER_FNAME'] . "</td>";
							echo "<td>" . $row['KEEPER_LNAME'] ."</td>";
							echo "<td>" . $row['ADDRESS'] ."</td>";
							echo "<td>" . $row['PHONE'] ."</td>";
							echo "<td>" . $row['EMAIL'] ."</td>";
							echo "<td>" . $row['FLOOR_NO'] ."</td>";
							echo "<td><a href='shop_edit.php?id=$idValue'> Edit </a></td>";                
							echo "<td><a href='shop_delete.php?id=$idValue' onclick='return ConfirmDelete()'> Delete </a></td>";
							echo "</tr>";
							$rowCount++;
						}                
					?>        
				</table>
				
				
			</div><!-- content -->	
			
			
			<!--footer-->
			<div class="col-md-12 webbottom">
						
						
							<?php require "../footer.php"; ?>
						
				 
			</div>
		</div>
	</body>
</html>