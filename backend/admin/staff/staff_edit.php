<?php require '../session.php'; ?>
<?php
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		include_once '../connection.php';
		$query="select * from SHOPKEEPER where STAFF_ID='".$_REQUEST['id']."'";
		$result = oci_parse($conn, $query);
		if(!oci_execute($result)){
			echo "Error: " . $query . "<br>" . oci_error($conn);
			
		}
		$rs=oci_fetch_array($result);
		
	//error spans
		$errorFirstName ="";
		$errorLastName ="";
		$errorAddress ="";
		$errorPhone ="";
		$errorEmail ="";
		$errorShop ="";			
						
		//when the register button is pressed
		if(isset($_POST['btnSave'])){
			
			$FirstName =$_POST['txtFirstName'];
			$LastName=$_POST['txtLastName'];
			$Address=$_POST['txtAddress'];
			$Phone=$_POST['txtPhone'];
			$Email=$_POST['txtEmail'];
			$Shop=$_POST['selectShop'];
			 
			
			
			//Validation
			//if passwords entered do not match
			if(empty($FirstName)){
				$errorFirstName="Enter FirstName. Cannot leave blank";
				}
			elseif(empty($LastName)){
				$errorLastName="Enter LastName. Cannot leave blank";
				}	
			elseif(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
				$errorEmail="Enter Email. Invalid Email format";
			}
			elseif(empty($Email)){
				$errorEmail="Enter Email. Cannot leave blank";
				}
			elseif(empty($Address)){
				$errorAddress="Enter Address. Cannot leave blank";
				}
			elseif(empty($Shop)){
				$errorShop="Enter Shop. Cannot leave blank";
				}
			elseif(empty($Phone)){
				$errorPhone="Enter Phone. Cannot leave blank";
				}			
			else
			
				$query2="UPDATE SHOPKEEPER SET 
				FIRST_NAME = '$FirstName',
				LAST_NAME = '$LastName',
				ADDRESS = '$Address',
				PHONE = $Phone,
				EMAIL = '$Email',
				SHOP_ID = $Shop
				where SHOP_ID=".$_REQUEST['id']."";
				$result2=oci_parse($conn, $query2); 
				
				if(oci_execute($result2))
				{
					header('Location:staff_list.php');
				}
				else
				{
					echo "Error: " . $query2 . "<br>" . oci_error($conn);
					echo '<script>alert('."Error: " . $query2 . "<br>" . oci_error($conn).')</script>';
				}
			}
					
                  
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
					<li><a href="staff_add.php">Add Staff</a></li>
					<li class="active"><a href="staff_list.php">List Staff</a></li>
					
				  </ul>
			</div><!-- submenu -->
		</div>
		
		
		<div class="row">
			<!-- content -->
			<div class="col-md-10 col-md-offset-1 mybody">
							
						<form method="post"  enctype="multipart/form-data" class="myform">
							<div class="form-group">
								<h3> Edit Staff </h3>
							</div>
							<div class="form-group">
								<label for="FnameID">First Name</label>
								<input value="<?php echo $rs['FIRST_NAME']?>" name="txtFirstName" id="FnameID" type="input" id="" class="form-control"  placeholder="First Name"><span class="formerror"> <?php echo $errorFirstName; ?></span>
							</div>
							<div class="form-group">
								<label for="LnameID">Last Name</label>
								<input value="<?php echo $rs['LAST_NAME']?>" name="txtLastName" id="LnameID" type="input" class="form-control"  placeholder="Last Name"><span class="formerror"><?php echo $errorLastName; ?> </span>
							</div>
							<div class="form-group">
								<label for="AddressID">Address</label>
								<input value="<?php echo $rs['ADDRESS']?>" name="txtAddress" type="input" class="form-control" id="AddressID" placeholder="Address"><span class="formerror"><?php echo $errorAddress; ?> </span>
							</div>
							<div class="form-group">
								<label for="PhoneID">Phone number</label>
								<input value="<?php echo $rs['PHONE']?>" name="txtPhone" id="PhoneID" type="input" class="form-control"  placeholder="Phone"><span class="formerror"><?php echo $errorPhone; ?> </span>
							</div>
							<div class="form-group">
								<label for="EmailID">Email</label>
								<input value="<?php echo $rs['EMAIL']?>" name="txtEmail" id="EmailID" type="email" class="form-control"  placeholder="Email"><span class="formerror"> <?php echo $errorEmail; ?></span>
							</div>
							<div class="form-group">
								<label for="category_id">Select Shop</label>
								<select name ='selectShop' id='category_id'>
									<?php 
										
										require "../connection.php";
										$query = "select * from shop";                    
								
										$result =	oci_parse($conn, $query);
										oci_execute($result);
										$rowCount = 1;	
										while($row = oci_fetch_assoc($result))
										{
											if($row['USERNAME'] == $rs['USERNAME']){
												echo '<option value="'.$row['USERNAME'].'" selected>'.$row['SHOP_NAME'].'</option>';
											}
											echo '<option value="'.$row['USERNAME'].'">'.$row['SHOP_NAME'].'</option>';
											$rowCount = $rowCount++;
									}
									?>		
								</select>    
								<?php echo $errorShop; ?> </span>
							</div>
							
							<input name="btnSave" type="submit" class="btn "value="Save">
						</form>	
					

			</div><!-- content -->	
			
			
			<!--footer-->
			<div class="col-md-12 webbottom">
						
						
							<?php require "../footer.php"; ?>
						
				 
			</div>
		</div>
	</body>
</html>