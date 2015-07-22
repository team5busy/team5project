
<?php
		require '../session.php';
		echo "<br />";
		echo "<br />";
		echo "<br />";
		echo "<br />";
		echo "<br />";
		//error spans
		$errorEmail ="";
		$errorUsername="";
		$errorPassword="";
		$errorRepassword="";
		$errorFloor="";
		$errorPhone="";
		$errorAddress="";
		$errorFname="";
		$errorLname="";
		$errorShopName="";
		$errorShopCategory="";				
						
		//when the register button is pressed
		if(isset($_POST['btnSubmit'])){
			
			$Email =$_POST['txtEmail'];
			$Username=$_POST['txtUsername'];
			$Password=$_POST['txtPassword'];
			$Password = md5($Password);
			$Repassword=$_POST['txtRePassword'];
			$Floor=$_POST['FloorID'];
			$Phone=$_POST['txtPhone'];
			$Address=$_POST['txtAddress'];
			$Fname=$_POST['txtShopkeeperFname'];
			$Lname=$_POST['txtShopkeeperLname'];
			$ShopName=$_POST['txtShopName'];
			$CategoryID = $_POST['selectShopCategory'];
			 
			
			
			//Validation
			//if passwords entered do not match
			if($Password != md5($Repassword)){
				$errorPassword= "passwords do not match!";
				
			}
			elseif(empty($Email)){
				$errorEmail="Enter Email. Cannot leave blank";
				}
			elseif(empty($Username)){
				$errorUsername="Enter Username. Cannot leave blank";
				}	
			elseif(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
				$errorEmail="Enter Email. Invalid Email format";
			}
			elseif(empty($Password)){
				$errorPassword="Enter Password. Cannot leave blank";
				}
			elseif(empty($Repassword)){
				$errorRepassword="re-enter Repassword. Cannot leave blank";
				}
			elseif(empty($Floor)){
				$errorFloor="Enter Floor. Cannot leave blank";
				}
			elseif(empty($Phone)){
				$errorPhone="Enter Phone number. Cannot leave blank";
				}
			elseif(empty($Address)){
				$errorAddress="Enter Address. Cannot leave blank";
				}	
			elseif(empty($Fname) ){
				$errorFname ="Enter First name. Cannot leave blank";
				}
			elseif(empty($Lname)){
				$errorLname="Enter Surname. Cannot leave blank";
				}
			elseif(empty($ShopName)){
				$errorShopName="Enter Shop name. Cannot leave blank";
				}	
			elseif(empty($Email)){
				$errorShopCategory="Choose Shop Category. Cannot leave blank";
				}				
			else{
				//establish connection
				require '../connection.php';
				
				$sql = "INSERT INTO Shop(	
											Username,
											Password,
											Shop_Name,
											Keeper_Fname,
											Keeper_Lname,
											Address,
											Phone,
											Email,
											Floor_No,
											Category_ID)	
				VALUES (
							'$Username',
							'$Password',
							'$ShopName',
							'$Fname',
							'$Lname',
							'$Address',
							$Phone,
							'$Email',
							$Floor,
							$CategoryID
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
					<li class="active"><a href="shop_add.php">Add Shop</a></li>
					<li><a href="shop_list.php">List Shop</a></li>
					
				  </ul>
			</div><!-- submenu -->
		</div>
		
		
		<div class="row">
			<!-- content -->
			<div class="col-md-10 col-md-offset-1 mybody">
					
					
					<form method="post"  enctype="multipart/form-data" class="myform">
						<div class="form-group">
							<h3> Add Shop </h3>
						</div>
						<div class="form-group">
							<label for="EmailId">Email</label>
							<input name="txtEmail" id="EmailId" type="email" id="" class="form-control"  placeholder="Email Address"><span class="formerror"> <?php echo $errorEmail; ?></span>
						</div>
						<div class="form-group">
							<label for="UsernameID">Username</label>
							<input name="txtUsername" id="UsernameID" type="input" class="form-control"  placeholder="Username"><span class="formerror"><?php echo $errorUsername; ?> </span>
						</div>
						<div class="form-group">
							<label for="PasswordID">Password</label>
							<input name="txtPassword" type="password" class="form-control" id="PasswordID" placeholder="Password"><span class="formerror"><?php echo $errorPassword; ?> </span>
						</div>
						<div class="form-group">
							<label for="RePasswordID">Re-enter Password</label>
							<input name="txtRePassword" type="password" class="form-control" id="RePasswordID" placeholder="Re-enter Password"><span class="formerror"><?php echo $errorPassword; ?> </span>
						</div>
						<div class="form-group">
							<label for="FloorID">Floor number</label>
							<select name="FloorID">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select><span class="formerror"> <?php echo $errorFloor; ?></span>
						</div>
						<div class="form-group">
							<label for="PhoneID">Phone number</label>
							<input name="txtPhone" id="PhoneID" type="input" class="form-control"  placeholder="Phone"><span class="formerror"><?php echo $errorPhone; ?> </span>
						</div>
						<div class="form-group">
							<label for="AddressID">Address</label>
							<input name="txtAddress" id="AddressID" type="input" class="form-control"  placeholder="Address"><span class="formerror"> <?php echo $errorAddress; ?></span>
						</div>
						<div class="form-group">
							<label for="FirstNameID">Shopkeeper First Name</label>
							<input name="txtShopkeeperFname" id="FirstNameID"  type="input" class="form-control"  placeholder="First Name"><span class="formerror"><?php echo $errorFname; ?> </span>
						</div>
						<div class="form-group">
							<label for="LastNameID">Shopkeeper Last Name</label>
							<input name="txtShopkeeperLname" id="LastNameID"  type="input" class="form-control" placeholder="Last Name"><span class="formerror"><?php echo $errorLname; ?> </span>
						</div>
						<div class="form-group">
							<label for="ShopNameID">Shop Name</label>
							<input name="txtShopName" id="ShopNameID" type="input" class="form-control"  placeholder="Shop Name"><span class="formerror"><?php echo $errorShopName; ?> </span>
						</div>
						<div class="form-group">
							<label for="category_id">Shop Category</label>
							<?php
							
							require '../connection.php';
							$queryCat = "Select * from Category ";                    
							$result2 = oci_parse($conn, $queryCat);	
							$rowCount = 1;
							
							oci_execute($result2);
							
							//for drop down list
							echo "<select name ='selectShopCategory' id='category_id'>";
							while($row = oci_fetch_assoc($result2))
							{
								
								$Name = $row['CATEGORY_NAME'];
								$ID = $row['CATEGORY_ID'];
									
								echo "<option value='$ID'>$Name</option>";                
								
								$rowCount++;
							}  
							echo "</select>";	
							?>      
							<?php echo $errorShopCategory; ?> </span>
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



