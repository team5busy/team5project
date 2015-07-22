<?php require '../session.php'; ?>
<?php
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		include_once '../connection.php';
		$query="select * from PRODUCT where PRODUCT_ID='".$_REQUEST['id']."'";
		$result = oci_parse($conn, $query);
		if(!oci_execute($result)){
			echo "Error: " . $query . "<br>" . oci_error($conn);
			
		}
		$rs=oci_fetch_array($result);
		
	//error spans
		//error spans
		$errorProductName  ="";
		$errorupload  ="";
		$errorShopID ="";
		$errorManufacturer ="";
		$errorPrice	 ="";		
						
		//when the register button is pressed
		if(isset($_POST['btnSave'])){
			
					$ProductName=$_POST['txtProductName'];
					$ShopID= $_POST['txtShopID'];
					$Manufacturer=$_POST['txtManufacturer'];
					$Price=$_POST['txtPrice'];
					 $target_dir = "../../images/";
						$target_file = $target_dir . basename($_FILES['upload']['name']);
						//to see if its ok to upload a file
						$uploadOk = 1;
						$upload = pathinfo($target_file,PATHINFO_EXTENSION);
					
					
					//Validation
					//if passwords entered do not match
					if(empty($ProductName)){
						$errorProductName="Enter FirstName. Cannot leave blank";
						}
					elseif(empty($ShopID)){
						$errorShopID="Enter Shop. Cannot leave blank";
						}
					elseif(empty($Manufacturer)){
						$errorManufacturer="Enter Floor. Cannot leave blank";
						}
					elseif(empty($Price)){
						$errorPrice="Enter Price. Cannot leave blank";
						}
						// Check if image file is a actual image or fake image
						elseif(isset($_POST["upload"])) {
							$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
							if($check !== false) {
								echo "File is an image - " . $check["mime"] . ".";
								$uploadOk = 1;
							} else {
								echo "File is not an image.";
								$uploadOk = 0;
							}
						}
						
						// Check file size
						elseif ($_FILES["upload"]["size"] > 500000) {
							echo "Sorry, your file is too large.";
							$uploadOk = 0;
						}
						
						
						
						// Check if $uploadOk is set to 0 by an error
						elseif ($uploadOk == 0) {
							echo "Sorry, your file was not uploaded.";
						// if everything is ok, try to upload file
						}				
					else{
						//checking if there is a file selected
						if(basename($_FILES['upload']['name']) != ""){
							$query2="UPDATE PRODUCT SET 
							PRODUCT_NAME = '$ProductName',
							Product_Image = '$target_file',
							SHOP_ID = '$ShopID',
							MANUFACTURER = '$Manufacturer',
							PRICE = '$Price'
							where PRODUCT_ID=".$_REQUEST['id']."";
							move_uploaded_file($_FILES["upload"]["tmp_name"] , $target_file);
							$result2=oci_parse($conn, $query2); 
							
							if(oci_execute($result2))
							{
								header('Location:product_list.php');
							}
							else
							{
								echo "Error: " . $query2 . "<br>" . oci_error($conn);
								echo '<script>alert('."Error: " . $query2 . "<br>" . oci_error($conn).')</script>';
							}
						}
						//incase a new image is not selected
						else{
							
							$query2="UPDATE PRODUCT SET 
							PRODUCT_NAME = '$ProductName',
							SHOP_ID = '$ShopID',
							MANUFACTURER = '$Manufacturer',
							PRICE = '$Price'
							where PRODUCT_ID=".$_REQUEST['id']."";
							$result2=oci_parse($conn, $query2); 
							
							if(oci_execute($result2))
							{
								header('Location:product_list.php');
							}
							else
							{
								echo "Error: " . $query2 . "<br>" . oci_error($conn);
								echo '<script>alert('."Error: " . $query2 . "<br>" . oci_error($conn).')</script>';
							}
							
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
					<li class="active"><a href="product_list.php">List Products</a></li>
					
				  </ul>
			</div><!-- submenu -->
		</div>
		
		
		<div class="row">
			<!-- content -->
			<div class="col-md-10 col-md-offset-1 mybody">
							
						<form method="post"  enctype="multipart/form-data" class="myform">
						<div class="form-group">
							<h3> Edit Product </h3>
						</div>
						<div class="form-group">
							<label for="LnameID">Product Name</label>
							<input name="txtProductName" value ="<?php echo $rs['PRODUCT_NAME'];?>" id="LnameID" type="input" class="form-control"  placeholder="Product Name"><span class="formerror"><?php echo $errorProductName; ?> </span>
						</div>
						<div class="form-group">
							<label for="upload">Image</label>
							<input type="file" name="upload" class="form-control" id="upload" ><span class="formerror"><?php echo $errorupload; ?> </span>
						</div>
						<div class="form-group">
							<label for="PhoneID">ShopID</label>
							<select name="txtShopID" id="PhoneID">
								<?php 
									require "../connection.php";
									$query9 = "select * from shop where USERNAME = '".$_SESSION['Shop']."'";                   
									echo $query9;
									$result9 =	oci_parse($conn, $query9);
									oci_execute($result9);
									$rowCount = 1;	
									while($row9 = oci_fetch_assoc($result9))
									{
										echo '<option value="'.$row9['USERNAME'].'">'.$row9['SHOP_NAME'].'</option>';
										$rowCount = $rowCount++;
									}
								?>
							</select><span class="formerror"><?php echo $errorShopID; ?> </span>
						</div>
						<div class="form-group">
							<label for="EmailId">Manufacturer</label>
							<input name="txtManufacturer" value ="<?php echo $rs['MANUFACTURER'];?>" id="EmailId" type="input" class="form-control"  placeholder="Manufacturer"><span class="formerror"><?php echo $errorManufacturer; ?> </span>
						</div>
						<div class="form-group">
							<label for="PriceID">Price(in NRS)</label>
							<input name="txtPrice" value ="<?php echo $rs['PRICE'];?>" id="PriceID" type="input" class="form-control"  placeholder="Price"><span class="formerror"><?php echo $errorPrice; ?> </span>
						</div>
						<input name="btnSave" type="submit" class="btn "value="Register">
				</form>
					

			</div><!-- content -->	
				
			
			<!--footer-->
			<div class="col-md-12 webbottom">
						
						
							<?php require "../footer.php"; ?>
						
				 
			</div>
		</div>
	</body>
</html>