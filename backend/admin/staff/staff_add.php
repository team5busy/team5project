
<?php
		require '../session.php';
		
		//error spans
		$errorFirstName ="";
		$errorLastName ="";
		$errorAddress ="";
		$errorPhone ="";
		$errorEmail ="";
		$errorShop ="";			
						
		//when the register button is pressed
		if(isset($_POST['btnSubmit'])){
			
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
			elseif(empty($Phone)){
				$errorPhone="Enter Floor. Cannot leave blank";
				}			
			else{
				//establish connection
				require '../connection.php';
				
				$sql = "INSERT INTO SHOPKEEPER(	
											FIRST_NAME,
											LAST_NAME,
											ADDRESS,
											PHONE,
											EMAIL,
											SHOP_ID
										)	
				VALUES (
							'$FirstName',
							'$LastName',
							'$Address',
							$Phone,
							'$Email',
							'$Shop'
						)";
				$result =	oci_parse($conn, $sql);
				
				if (oci_execute($result)) {
					$url= '../registersuccess.php';
					echo "<script>window.location='".$url."';</script>";   
				}					
				else
					echo "Error: " . $sql . "<br>" . oci_error($conn);
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
					<li class="active"><a href="staff_add.php">Add Staff</a></li>
					<li><a href="staff_list.php">List Staff</a></li>
					
				  </ul>
			</div><!-- submenu -->
		</div>
		
		
		<div class="row">
			<!-- content -->
			<div class="col-md-10 col-md-offset-1 mybody">
				
				
				
				<form method="post"  enctype="multipart/form-data" class="myform">
						<div class="form-group">
							<h3> Add Staff </h3>
						</div>
						<div class="form-group">
							<label for="FnameID">First Name</label>
							<input name="txtFirstName" id="FnameID" type="input" id="" class="form-control"  placeholder="First Name"><span class="formerror"> <?php echo $errorFirstName; ?></span>
						</div>
						<div class="form-group">
							<label for="LnameID">Last Name</label>
							<input name="txtLastName" id="LnameID" type="input" class="form-control"  placeholder="Last Name"><span class="formerror"><?php echo $errorLastName; ?> </span>
						</div>
						<div class="form-group">
							<label for="AddressID">Address</label>
							<input name="txtAddress" type="input" class="form-control" id="AddressID" placeholder="Address"><span class="formerror"><?php echo $errorAddress; ?> </span>
						</div>
						<div class="form-group">
							<label for="PhoneID">Phone</label>
							<input name="txtPhone" type="input" class="form-control" id="PhoneID" placeholder="Phone"><span class="formerror"><?php echo $errorPhone; ?> </span>
						</div>
						<div class="form-group">
							<label for="EmailId">Email</label>
							<input name="txtEmail" id="EmailId" type="input" class="form-control"  placeholder="Email Id"><span class="formerror"><?php echo $errorEmail; ?> </span>
						</div>
						<div class="form-group">
							<label for="ShopID">Shop</label>
							<select name="selectShop" id="ShopID">
								<?php 
									require "../connection.php";
									$query = "select * from shop";                    
							
									$result =	oci_parse($conn, $query);
									oci_execute($result);
									$rowCount = 1;	
									while($row = oci_fetch_assoc($result))
									{
										echo '<option value="'.$row['USERNAME'].'">'.$row['SHOP_NAME'].'</option>';
										$rowCount = $rowCount++;
									}
								?>
							</select><span class="formerror"> <?php echo $errorShop; ?></span>
						</div>
						<input name="btnSubmit" type="submit" class="btn "value="Register">
				</form>
				
				
			</div><!-- content -->	
			
			
			<!--footer-->
			<div class="col-md-12 webbottom">
						
						
							<?php require "../footer.php"; ?>
						
				 
			</div>
		</div>
	</body>
</html>