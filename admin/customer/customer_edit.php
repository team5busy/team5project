<?php require '../session.php'; ?>
<?php
	include_once '../connection.php';
	$userID = $_REQUEST['id'];
	$fullName = "";
	$username = "";
	$email = "";
	$active = 0;
	$password = "";
    $query="select * from User where UserID=$userID";
	//echo $query;	
    $result=mysqli_query($conn, $query);    
	while($row = mysqli_fetch_assoc($result))
    {
        $idValue = $row['UserID'];        
        $fullName = $row['FullName'] ;
        $username = $row['Username'] ;
        $email = $row['Email'];
        $password = $row['Password'];
		$active = $row['IsActive'];
	}
    if(isset($_POST['btnSave']))
    {
    	
        $fullName = $_POST['txtFullName'];
    	$username = $_POST['txtUsername'];
    	$email = $_POST['txtEmail'];
    	$password = $_POST['txtPassword'];   
        $active = 0;        
        if(isset($_POST['chkActive'])) 
            $active	= 1;
                	
    	$sql = "Update User Set FullName='$fullName', Username='$username', Email='$email', 
    			Password='$password', IsActive=$active Where UserID=$userID";
                    
        if (mysqli_query($conn, $sql))            
        {
            header('Location:user_list.php');
        }
        else
        {
            echo "Update Failed";
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
					<li><a href="customer_add.php">Add Customer</a></li>
					<li class="active"><a href="customer_list.php">List Customer</a></li>
					
				  </ul>
			</div><!-- submenu -->
		</div>
		
		
		<div class="row">
			<!-- content -->
			<div class="col-md-10 col-md-offset-1 mybody">

			</div><!-- content -->	
			
			
			<!--footer-->
			<div class="col-md-12 webbottom">
						
						
							<?php require "../footer.php"; ?>
						
				 
			</div>
		</div>
	</body>
</html>