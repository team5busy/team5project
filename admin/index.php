<?php 
   	session_start();
	include("connection.php");	
	
	$error_msg = '';
	$errorUsername ="";
	$errorPassword ="";
	
	if(isset($_POST['btnLogin']))
	{						
		$uName = $_POST['txtUsername'];
		$pass = $_POST['txtPassword'];	
		
		$query="SELECT * FROM superadmin WHERE Username='$uName' AND Password='$pass'";								
		
		$result = oci_parse($conn, $query);			
		
		oci_execute($result);
		if($row = oci_fetch_array($result))
		{			
			$_SESSION['superadmin']=$uName;			
			$url = "dashboard/dashboard.php";									
					
			echo "<script>window.location='".$url."';</script>";	
		}
		else
		{			
			echo '<script>alert("Login Failed! Try again.");</script>';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Bishal Bazaar | Home </title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../js/jquery.min.js"></script>
<script src="../js/transition.js"></script>
<script src="../js/dropdown.js"></script>
<script src="../js/collapse.js"></script>

<!-- Custom Theme files -->
<!--theme-style-->
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/styleedit.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/animate.css" rel="stylesheet" type="text/css"  media="all" />		
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
		<?php require "header2.php"; ?>
	<!--header-->	
		
	<!--content-->
	<div class="content">
		<div class="container">
			<div class="register">
		  	  <form method="post"  enctype="multipart/form-data" class="myform"> 
				 <div class="  register-top-grid">
					<h3>ADMIN LOGIN</h3>
					<div class="mation">
						<span>Username<label>*</label></span>
						<input name="txtUsername" id="UsernameID" type="input" id="" class="form-control"  placeholder="Username"><span class="formerror"> <?php echo $errorUsername; ?></span>
					
						<span>Password<label>*</label></span>
						<input name="txtPassword" id="PasswordID" type="password" class="form-control"  placeholder="Password"><span class="formerror"><?php echo $errorPassword; ?> </span> 
						 <?php echo $error_msg; ?>
					</div>
					 <div class="clearfix"> </div>
					   
						<div class="form-in">
							<input name="btnLogin" type="submit" class="btn "value="Login">
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
	<?php require "footer2.php";?>
	<!--footer-->
	
</body>
</html>