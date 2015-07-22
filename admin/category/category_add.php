
<?php
		require '../session.php';
		//error spans
		$errorCategoryName ="";		
						
		//when the register button is pressed
		if(isset($_POST['btnSubmit'])){
			
			$CategoryName =$_POST['txtCategoryName'];
			
			
			
			//Validation
			//if passwords entered do not match
			if(empty($CategoryName)){
				$errorFirstName="Enter Category Name. Cannot leave blank";
				}
						
			else{
				//establish connection
				require '../connection.php';
				
				$sql = "INSERT INTO CATEGORY(	
											CATEGORY_NAME
											
										)	
				VALUES (
							'$CategoryName'
							
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
					<li class="active"><a href="category_add.php">Add Category</a></li>
					<li><a href="category_list.php">List Category</a></li>
					
				  </ul>
			</div><!-- submenu -->
		</div>
		
		
		<div class="row">
			<!-- content -->
			<div class="col-md-10 col-md-offset-1 mybody">
				
				
				
				<form method="post"  enctype="multipart/form-data" class="myform">
						<div class="form-group">
							<h3> Add Category </h3>
						</div>
						<div class="form-group">
							<label for="CategoryNameID">Category Name</label>
							<input name="txtCategoryName" id="CategoryNameID" type="input" id="" class="form-control"  placeholder="First Name"><span class="formerror"> <?php echo $errorCategoryName; ?></span>
						</div>
						
						
						<input name="btnSubmit" type="submit" class="btn "value="Add Category">
				</form>
				
				
			</div><!-- content -->	
			
			
			<!--footer-->
			<div class="col-md-12 webbottom">
						
						
							<?php require "../footer.php"; ?>
						
				 
			</div>
		</div>
	</body>
</html>