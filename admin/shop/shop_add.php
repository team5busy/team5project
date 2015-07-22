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
					<h3>Add Shop</h3>
					<div class="mation">
						<span>Email<label>*</label></span>
						<input name="txtEmail" id="EmailId" type="email" id="" class="form-control"  placeholder="Email Address"><span class="formerror"> <?php echo $errorEmail; ?></span>
					
						<span>Username<label>*</label></span>
						<input name="txtUsername" id="UsernameID" type="input" class="form-control"  placeholder="Username"><span class="formerror"><?php echo $errorUsername; ?> </span>
					 
						  
						 <span>Password<label>*</label></span>
						 <input name="txtPassword" type="password" class="form-control" id="PasswordID" placeholder="Password"><span class="formerror"><?php echo $errorPassword; ?> </span>
						 
						 <span>Re-enter Password<label>*</label></span>
						 <input name="txtRePassword" type="password" class="form-control" id="RePasswordID" placeholder="Re-enter Password"><span class="formerror"><?php echo $errorPassword; ?> </span>
						 
						 
						 
						 <span>Floor number<label>*</label></span>
						 <select name="FloorID">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select><span class="formerror"> <?php echo $errorFloor; ?></span>
						
						<span>Phone number<label>*</label></span>
						 <input name="txtPhone" id="PhoneID" type="input" class="form-control"  placeholder="Phone"><span class="formerror"><?php echo $errorPhone; ?> </span>
						 
						 <span>Address<label>*</label></span>
						 <input name="txtAddress" id="AddressID" type="input" class="form-control"  placeholder="Address"><span class="formerror"> <?php echo $errorAddress; ?></span>
						 
						 <span>Shopkeeper First Name<label>*</label></span>
						 <input name="txtShopkeeperFname" id="FirstNameID"  type="input" class="form-control"  placeholder="First Name"><span class="formerror"><?php echo $errorFname; ?> </span>
						 
						 <span>Shopkeeper Last Name<label>*</label></span>
						<input name="txtShopkeeperLname" id="LastNameID"  type="input" class="form-control" placeholder="Last Name"><span class="formerror"><?php echo $errorLname; ?> </span>
						 
						 <span>Shop Name<label>*</label></span>
						 <input name="txtShopName" id="ShopNameID" type="input" class="form-control"  placeholder="Shop Name"><span class="formerror"><?php echo $errorShopName; ?> </span>
						 
						 <span>Shop Category<label>*</label></span>
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