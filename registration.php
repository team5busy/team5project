<?php 
	session_start();?><?php
	
		//error spans
		$errorUsername ="";
		$errorPassword ="";
		$errorRePassword ="";
		$errorAddress ="";
		$errorPhone ="";
		$errorEmail ="";
		$errorCustomerName ="";	
						
		//when the register button is pressed
		if(isset($_POST['btnSubmit'])){
			
			$Username =$_POST['txtUsername'];			
			$Password=$_POST['txtPassword'];
			$Password = md5($Password);
			$RePassword = $_POST['txtRePassword'];
			$RePassword = md5($RePassword);
			$Address=$_POST['txtAddress'];
			$Phone=$_POST['txtPhone'];
			$Email=$_POST['txtEmail'];
			$CustomerName =$_POST['txtCustomerName'];
			
			
			//Validation
			//if passwords entered do not match
			if($RePassword != $Password){
				$errorPassword ="Passwords do not match";
			}
			elseif(empty($Username)){
				$errorFirstName="Enter Username. Cannot leave blank";
				}
			elseif(empty($Password)){
				$errorPassword="Enter Password. Cannot leave blank";
				}	
				elseif(empty($RePassword)){
				$errorRePassword="Enter Re-enter Password. Cannot leave blank";
				}	
			elseif(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
				$errorEmail="Enter Email. Invalid Email format";
			}
			elseif(empty($CustomerName)){
				$errorCustomerName="Enter CustomerName. Invalid Email format";
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
				require 'connection.php';
				
				$sql = "INSERT INTO Customer(	
											Username,
											Password,
											Customer_Name,
											Address,
											Phone,
											Email	
										)	
				VALUES (
							'$Username',
							'$Password',
							'$CustomerName',
							'$Address',
							$Phone,
							'$Email'
							
						)";
				$result =	oci_parse($conn, $sql);
				
				if (oci_execute($result)) {
					echo "<script>alert('Registration Complete!');</script>";   
				}					
				else
					echo "Error: " . $sql . "<br>" . oci_error($conn);
			}
		}

?>
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
		<div class="register">
		  	  <form method="post"  enctype="multipart/form-data" class="myform"> 
				 <div class="  register-top-grid">
					<h3>PERSONAL INFORMATION</h3>
					<div class="mation">
						<span>Username<label>*</label></span>
						<input name="txtUsername" id="UsernameID" type="input" id="" class="form-control"  placeholder="Username"><span class="formerror"> <?php echo $errorUsername; ?></span>
					
						<span>Password<label>*</label></span>
						<input name="txtPassword" id="PasswordID" type="password" class="form-control"  placeholder="Password"><span class="formerror"><?php echo $errorPassword; ?> </span> 
					 
						 <span>Re-enter Password<label>*</label></span>
						 <input name="txtRePassword" id="RePasswordID" type="password" class="form-control"  placeholder="Re-enter Password"><span class="formerror"><?php echo $errorRePassword; ?> </span>
						 
						 <span>Your Name<label>*</label></span>
						 <input name="txtCustomerName" type="input" class="form-control" id="CustomerNameID" placeholder="Customer Name"><span class="formerror"><?php echo $errorCustomerName; ?> </span>
						 
						 <span>Address<label>*</label></span>
						 <input name="txtAddress" type="input" class="form-control" id="AddressID" placeholder="Address"><span class="formerror"><?php echo $errorAddress; ?> </span>
						 
						 <span>Phone Number<label>*</label></span>
						 <input name="txtPhone" type="input" class="form-control" id="PhoneID" placeholder="Phone"><span class="formerror"><?php echo $errorPhone; ?> </span>
						 
						 <span>Email Address<label>*</label></span>
						 <input name="txtEmail" id="EmailId" type="email" class="form-control"  placeholder="Email Id"><span class="formerror"><?php echo $errorEmail; ?> </span>
					</div>
					 <div class="clearfix"> </div>
					   
						<div class="form-in">
							<input name="btnSubmit" type="submit" class="btn "value="Register">
						</div>
						<div style="height:200px;">
						
						</div>
				  </div>
				     
			  </form>
		   </div>
		 </div>
	</div><!--content-->
	<!---->
	
	<!--footer-->
	<?php require "footer.php";?>
	<!--footer-->
	
</body>
</html>