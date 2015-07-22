<?php require '../session.php'; ?>
<?php
    echo "<br/>";
					echo "<br/>";
					echo "<br/>";
					echo "<br/>";
					echo "<br/>";
					echo "<br/>";
	include_once '../connection.php';
    $query="select * from Shop where USERNAME='".$_REQUEST['id']."'";
    $result = oci_parse($conn, $query);
	oci_execute($result);
    $rs=oci_fetch_array($result);
	
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
	
    if(isset($_POST['btnSave']))
    {
			$Email =$_POST['txtEmail'];
			$Username=$_POST['txtUsername'];
			$Password=$_POST['txtPassword'];
			$Password= md5($Password);
			$Floor=$_POST['selectFloor'];
			$Phone=$_POST['txtPhone'];
			$Address=$_POST['txtAddress'];
			$Fname=$_POST['txtShopkeeperFname'];
			$Lname=$_POST['txtShopkeeperLname'];
			$ShopName=$_POST['txtShopName'];
			$CategoryID = $_POST['selectShopCategory'];
			//Validation
			//if passwords entered do not match
			if(empty($Email)){
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
				$query2="UPDATE Shop SET EMAIL = '$Email', USERNAME = '$Username', PASSWORD = '$Password',  FLOOR_NO = $Floor, PHONE = $Phone, ADDRESS = '$Address', KEEPER_FNAME = '$Fname', KEEPER_LNAME = '$Lname', SHOP_NAME = '$ShopName', CATEGORY_ID = $CategoryID where USERNAME='".$_REQUEST['id']."'";
				$result2=oci_parse($conn, $query2); 
				
				if(oci_execute($result2))
				{
					header('Location:shop_list.php');
				}
				else
				{
					
					echo "Error: " . $query2 . "<br>" . oci_error($conn);
				}
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
					<li><a href="shop_add.php">Add Shop</a></li>
					<li class="active"><a href="shop_list.php">List Shop</a></li>
					
				  </ul>
			</div><!-- submenu -->
		</div>
		
		
		<div class="row">
			<!-- content -->
			<div class="col-md-10 col-md-offset-1 mybody">
			
			
			
				<form method="post"  enctype="multipart/form-data" class="myform">
						<div class="form-group">
							<h3> Edit Shop </h3>
						</div>
						<div class="form-group">
							<label for="EmailId">Email</label>
							<input value="<?php echo $rs['EMAIL']?>" name="txtEmail" id="EmailId" type="email" id="" class="form-control"  placeholder="Email Address"><span class="formerror"> <?php echo $errorEmail; ?></span>
						</div>
						<div class="form-group">
							<label for="UsernameID">Username</label>
							<input value="<?php echo $rs['USERNAME']?>" name="txtUsername" id="UsernameID" type="input" class="form-control"  placeholder="Username"><span class="formerror"><?php echo $errorUsername; ?> </span>
						</div>
						<div class="form-group">
							<label for="PasswordID">Password</label>
							<input value="<?php ?>" name="txtPassword" type="input" class="form-control" id="PasswordID" placeholder="Password"><span class="formerror"><?php echo $errorPassword; ?> </span>
						</div>
						<div class="form-group">
							<label for="FloorID">Floor number</label>
							<select name="selectFloor" id="FloorID">
								<?php 
									$one ="";
									$two ="";
									$three ="";
									$four ="";
									$five ="";
									
									if($rs['FLOOR_NO'] == 1)
										$one ="selected";
									if($rs['FLOOR_NO'] == 2)
										$two ="selected";
									if($rs['FLOOR_NO'] == 3)
										$three ="selected";
									if($rs['FLOOR_NO'] == 4)
										$four ="selected";
									if($rs['FLOOR_NO'] == 5)
										$five ="selected";
								?>
								<option value='1'<?php echo $one; ?>>1</option> 
								<option value='2'<?php echo $two; ?>>2</option> 
								<option value='3'<?php echo $three; ?>>3</option> 
								<option value='4'<?php echo $four; ?>>4</option> 
								<option value='5'<?php echo $five; ?>>5</option>
							</select><span class="formerror"> <?php echo $errorFloor; ?></span>
						</div>
						<div class="form-group">
							<label for="PhoneID">Phone number</label>
							<input value="<?php echo $rs['PHONE']?>" name="txtPhone" id="PhoneID" type="input" class="form-control"  placeholder="Phone"><span class="formerror"><?php echo $errorPhone; ?> </span>
						</div>
						<div class="form-group">
							<label for="AddressID">Address</label>
							<input value="<?php echo $rs['ADDRESS']?>" name="txtAddress" id="AddressID" type="input" class="form-control"  placeholder="Address"><span class="formerror"> <?php echo $errorAddress; ?></span>
						</div>
						<div class="form-group">
							<label for="FirstNameID">Shopkeeper First Name</label>
							<input value="<?php echo $rs['KEEPER_FNAME']?>" name="txtShopkeeperFname" id="FirstNameID"  type="input" class="form-control"  placeholder="First Name"><span class="formerror"><?php echo $errorFname; ?> </span>
						</div>
						<div class="form-group">
							<label for="LastNameID">Shopkeeper Last Name</label>
							<input value="<?php echo $rs['KEEPER_LNAME']?>" name="txtShopkeeperLname" id="LastNameID"  type="input" class="form-control" placeholder="Last Name"><span class="formerror"><?php echo $errorLname; ?> </span>
						</div>
						<div class="form-group">
							<label for="ShopNameID">Shop Name</label>
							<input value="<?php echo $rs['SHOP_NAME']?>" name="txtShopName" id="ShopNameID" type="input" class="form-control"  placeholder="Shop Name"><span class="formerror"><?php echo $errorShopName; ?> </span>
						</div>
						<div class="form-group">
							<label for="category_id">Shop Category</label>
							<select name ='selectShopCategory' id='category_id'>
								<?php 
									$one ="";
									$two ="";
									$three ="";
									$four ="";
									$five ="";
									
									if($rs['CATEGORY_ID'] == 1)
										$one ="selected";
									if($rs['CATEGORY_ID'] == 2)
										$two ="selected";
									if($rs['CATEGORY_ID'] == 3)
										$three ="selected";
									if($rs['CATEGORY_ID'] == 4)
										$four ="selected";
									if($rs['CATEGORY_ID'] == 5)
										$five ="selected";
								?>
								<option value='1'<?php echo $one; ?>>Sports</option> 
								<option value='2'<?php echo $two; ?>>Casual Wear</option> 
								<option value='3'<?php echo $three; ?>>Formal Wear</option> 
								<option value='4'<?php echo $four; ?>>Electronics</option> 
								<option value='5'<?php echo $five; ?>>Music</option> 		
							</select>    
							<?php echo $errorShopCategory; ?> </span>
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