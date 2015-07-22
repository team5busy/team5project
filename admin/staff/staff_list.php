<?php
		require '../session.php';
		
		//error spans
		
		$errorShop ="";			
						
		
			
			
?>	
<!DOCTYPE html>
<html>
<head>
<title>Bishal Bazaar | Home </title>
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../../js/jquery.min.js"></script>
<script src="../../js/transition.js"></script>
<script src="../../js/dropdown.js"></script>
<script src="../../js/collapse.js"></script>

<!-- Custom Theme files -->
<!--theme-style-->
<link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../css/styleedit.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../css/animate.css" rel="stylesheet" type="text/css"  media="all" />		
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
		<?php require "../header.php"; ?>
	<!--header-->	
		
	<!--content-->
	<div class="content">
		<div class="container">
			<div class="  col-m-on">
				<!---->
				<div class="in-line">
					<div class="para-all-in">
						<h3>Staff List</h3>
						<p>Select a shop to display their staff.</p>
					</div>
				</div>
				<div class="lady-on">
					
					<form method="post"  enctype="multipart/form-data" class="myform">
						<div class="form-group">
							<h3> List Staff- Select a shop to display their staff </h3>
						</div>
						<div class="form-group">
							<label for="EmailId">Shop</label>
							<select name="selectShop" id="ShopID">
							<?php
								require "../connection.php";	
								
								$query2 = "select * from Shop";
								$result2 =	oci_parse($conn, $query2);
								oci_execute($result2);	
								
								
								while($row2 = oci_fetch_array($result2))
								{	
									echo '<option value="'.$row2['USERNAME'].'">'.$row2['SHOP_NAME'].'</option>';
									$rowCount = $rowCount++;
								}
							
							?>
							</select><span class="formerror"> <?php echo $errorShop; ?></span>
						</div>
						<div class="form-in" style="margin-bottm:80px;margin-left:80px;">
							<input name="btnSubmit" type="submit" class="btn "value="Go!">
						</div>	
					</form>

					<table class="table mytable">
						<tr>
							<th>S.N.</th>
							<th>Shopkeeper ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Address</th>
							<th>Phone</th>
							<th>Email Address</th>
							<th>Shop ID</th>
						</tr>
						<?php
							$ShopID ="";
							//when the register button is pressed
							if(isset($_POST['btnSubmit'])){
								$ShopID =$_POST['selectShop'];
							}	
							
							$query3 = "select * from SHOPKEEPER";                    
								
							$result3 =	oci_parse($conn, $query3);
							oci_execute($result3);
							$rowCount = 1;	
							
							while($row3 = oci_fetch_assoc($result3))
							{	
									
								//if the shop id matches
								if($row3['SHOP_ID'] == $ShopID){
									$idValue = $row3['STAFF_ID'];
									if($rowCount%2 != 0)
										echo "<tr>";
									else
										echo "<tr>";
									echo "<td>" . $rowCount . "</td>";
									echo "<td>" . $row3['STAFF_ID'] . "</td>";
									echo "<td>" . $row3['FIRST_NAME'] . "</td>";
									echo "<td>" . $row3['LAST_NAME'] . "</td>";
									echo "<td>" . $row3['ADDRESS'] . "</td>";
									echo "<td>" . $row3['PHONE'] ."</td>";
									echo "<td>" . $row3['EMAIL'] ."</td>";
									echo "<td>" . $row3['SHOP_ID'] ."</td>";
									echo "<td><a href='staff_edit.php?id=$idValue'> Edit </a></td>";                
									echo "<td><a href='staff_delete.php?id=$idValue' onclick='return ConfirmDelete()'> <button type='button' class='close' aria-label='Close'><span aria-hidden='true'>&times;</span></button></a></td>";
									echo "</tr>";
									$rowCount++;
								}
							}                
						?>        
					</table>
				
				
				</div>
			</div>
		</div>
	</div><!--content-->
	<!---->
	
	<!--footer-->
	<?php require "../footer.php";?>
	<!--footer-->
	
</body>
</html>