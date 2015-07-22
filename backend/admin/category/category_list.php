<?php
		require '../session.php';
		
		//error spans
		
		$errorShop ="";			
						
		
			
			
?>			
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
					<li class="active"><a href="category_add.php">Add Category</a></li>
					<li><a href="category_list.php">List Category</a></li>
					
				  </ul>
			</div><!-- submenu -->
		</div>
		
		
		<div class="row">
			<!-- content -->
			<div class="col-md-10 col-md-offset-1 mybody myform">
					
					
				

				<h3> Category List </h3>
				<table class="table mytable">
					<tr>
						<th>S.N.</th>
						<th>Category Name</th>
						
					</tr>
					<?php
						
						require "../connection.php";
						$query3 = "select * from CATEGORY";                    
							
						$result3 =	oci_parse($conn, $query3);
						oci_execute($result3);
						$rowCount = 1;	
						
						while($row3 = oci_fetch_assoc($result3))
						{	
								
							
								$idValue = $row3['CATEGORY_ID'];
								if($rowCount%2 != 0)
									echo "<tr>";
								else
									echo "<tr>";
								echo "<td>" . $rowCount . "</td>";
								echo "<td>" . $row3['CATEGORY_NAME'] . "</td>";
								
								echo "<td><a href='category_edit.php?id=$idValue'> Edit </a></td>";                
								echo "<td><a href='category_delete.php?id=$idValue' onclick='return ConfirmDelete()'> Delete </a></td>";
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