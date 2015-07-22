<?php 
   	session_start();
	include("connection.php");	
	
	$error_msg = '';
	
	if(isset($_POST['btnLogin']))
	{						
		$uName = $_POST['txtUsername'];
		$pass = $_POST['txtPassword'];					
			echo "user".$uName;	
		echo " password".$pass;	
		
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
			$error_msg = "<div class='errormsg'> Login Failed </div>";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Bishal bazaar - shop online! </title>
		<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="../js/jquery.min.js"></script>
		<!-- JavaScript Includes -->
		<script src="../js/transition.js"></script>
		<script src="../js/dropdown.js"></script>
		<script src="../js/collapse.js"></script>
		<!-- Custom Theme files -->
		<!--theme-style-->
		<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />	
		<link href="../css/animate.css" rel="stylesheet" type="text/css"  media="all" />
		<!--//theme-style-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Shop online kathmandu e-commerce bishal bazaar clothes shoes watches phones mobile tv " />
		
		 
	</head>
	<body>
		
		
		

		<div class="row">
			<a href="" style="margin-top:1%; margin-left:1%;">
				<!--logo-->
				<div class="logo animated bounceInLeft">
					<!-- Logo and search button animated-->
					<a href="index.php"><img src="../images/logo.png" alt="" /></a>				
				</div><!--logo-->
				<div>
				
				
				</div>
			</a>	
			
		</div>
		
		
		<div class="row">
			<!-- content -->
			<div class="col-md-10 col-md-offset-1 mybody">
				
				<div class="logindiv"> 
						        		        
						<form name="f1" method="POST">   	        
							
								
								<table>
									<tr>				
										<th style="border-radius:10px 0px 0px 0px;"> Admin Login </th>
										<th>   <p> Bishal Bazaar </p> </th>	
									</tr>
									<tr>				
										<td > Username </td>
										<td > <input type="text" name="txtUsername">  </td>
									</tr>							 	
									<tr>				
										<td> Password </td>
										<td> <input type="password" name="txtPassword">  </td>
									</tr>	
									<tr>				
										<td>&nbsp;  </td>
										<td> <input name="btnLogin" type="submit" class="btn "value="Login"> </td>	
									</tr>
									<tr>				
										<td > <?php echo $error_msg; ?> </td>
									</tr>
								</table>
															
								
						</form>
					 
				</div>

			</div><!-- content -->	
			
			
			<!--footer-->
			<div class="col-md-12 webbottom">
						
						
							<?php require "../footer.php"; ?>
						
				 
			</div>
		</div>
	</body>
</html>