<?php require '../session.php'; ?>
<?php
		
		include_once '../connection.php';
		$query="select * from CATEGORY where CATEGORY_ID='".$_REQUEST['id']."'";
		$result = oci_parse($conn, $query);
		if(!oci_execute($result)){
			echo "Error: " . $query . "<br>" . oci_error($conn);
			
		}
		$rs=oci_fetch_array($result);
		
	//error spans
		$errorCategoryName ="";
				
						
		//when the register button is pressed
		if(isset($_POST['btnSave'])){
			
			$CategoryName =$_POST['txtCategoryName'];
			
			 
			
			
			//Validation
			//if passwords entered do not match
			if(empty($CategoryName)){
				$errorCategoryName="Enter FirstName. Cannot leave blank";
				}
						
			else
			
				$query2="UPDATE CATEGORY SET 
				CATEGORY_NAME = '$CategoryName'
				where CATEGORY_ID=".$_REQUEST['id']."";
				$result2=oci_parse($conn, $query2); 
				
				if(oci_execute($result2))
				{
					header('Location:category_list.php');
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
					<li><a href="category_add.php">Add Category</a></li>
					<li class="active"><a href="category_list.php">List Category</a></li>
					
				  </ul>
			</div><!-- submenu -->
		</div>
		
		
		<div class="row">
			<!-- content -->
			<div class="col-md-10 col-md-offset-1 mybody">
							
						<form method="post"  enctype="multipart/form-data" class="myform">
							<div class="form-group">
								<h3> Edit Category </h3>
							</div>
							<div class="form-group">
								<label for="CategoryNameID">Category Name</label>
								<input value="<?php echo $rs['CATEGORY_NAME']?>" name="txtCategoryName" id="CategoryNameID" type="input" id="" class="form-control"  placeholder="First Name"><span class="formerror"> <?php echo $errorCategoryName; ?></span>
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