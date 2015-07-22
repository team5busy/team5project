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
		<div class="register">
		  	  <form method="post"  enctype="multipart/form-data" class="myform"> 
				 <div class="  register-top-grid">
					<h3>PERSONAL INFORMATION</h3>
					<div class="mation">
						<span>First Name<label>*</label></span>
						<input name="txtFirstName" id="FnameID" type="input" id="" class="form-control"  placeholder="First Name"><span class="formerror"> <?php echo $errorFirstName; ?></span>
					
						<span>Last Name<label>*</label></span>
						<input name="txtLastName" id="LnameID" type="input" class="form-control"  placeholder="Last Name"><span class="formerror"><?php echo $errorLastName; ?> </span>
					 
						  
						 <span>Address<label>*</label></span>
						 <input name="txtAddress" type="input" class="form-control" id="AddressID" placeholder="Address"><span class="formerror"><?php echo $errorAddress; ?> </span>
						 
						 <span>Phone Number<label>*</label></span>
						 <input name="txtPhone" type="input" class="form-control" id="PhoneID" placeholder="Phone"><span class="formerror"><?php echo $errorPhone; ?> </span>
						 
						 <span>Email Address<label>*</label></span>
						 <input name="txtEmail" id="EmailId" type="input" class="form-control"  placeholder="Email Id"><span class="formerror"><?php echo $errorEmail; ?> </span>
						 
						 <span>Shop<label>*</label></span>
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
					 <div class="clearfix"> </div>
					   
						<div class="form-in">
							<input name="btnSubmit" type="submit" class="btn "value="Add">
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
	<?php require "../footer.php";?>
	<!--footer-->
	
</body>
</html>