<?php
				if(isset($_POST['txtSearch'])){
					$send = $_POST['txtSearch'];
					header('Location:search.php?id='.$send.'');
				}
				?>
<?php 
	include("connection.php");	//include connection
	

	
	
	$error_msg = '';
	
	if(isset($_POST['btnLogin']))
	{						
		$uName = $_POST['txtUsername'];
		$pass = $_POST['txtPassword'];					
		$pass = md5($pass);	//convert the encryption
		
		$query="SELECT * FROM Customer WHERE USERNAME ='$uName' AND Password ='$pass'";								
		
		$result = oci_parse($conn, $query);			
		
		oci_execute($result);
		if($row = oci_fetch_array($result))
		{			
			$_SESSION['Customer']=$uName;			
			$url = "index.php";									
					
			echo "<script>window.location='".$url."';</script>";	
		}
		else
		{		
			$url = "login.php";	
			echo "<script>window.location='".$url."';</script>";	
		}
	}
?>
<div class="header">
		<div class="header-top">
			<div class="container">
				<div class="header-grid">
					<ul>
						<li  ><a href="articles.php" class="scroll">Articles</a></li>
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Browse floors <span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<?php
								echo '<li><a href="floors.php?id=1">Floor 1</a></li>';
								echo '<li><a href="floors.php?id=2">Floor 2</a></li>';
								echo '<li><a href="floors.php?id=3">Floor 3</a></li>';
								echo '<li><a href="floors.php?id=4">Floor 4</a></li>';
								echo '<li><a href="floors.php?id=5">Floor 5</a></li>';
							?>
						  </ul>
						</li>
						<li><a href="#" class="scroll">About</a></li>	
						<li><a href="#" class="scroll">Contact</a></li>	
					</ul>
				</div>
				
				<!--loginbox and my account-->
				<?php
					if(!isset($_SESSION['Customer'])){
						echo '<div class="header-grid-right">';
							echo '<a href="#" class="sign-in">Sign In</a>';
							echo '<form name="f1" method="POST">';
							echo '	<input name ="txtUsername" type="text" value="Username" onfocus="this.value=\'\';" onblur="if (this.value == \'\') {this.value =\'\';}">';
							echo '	<input name ="txtPassword" type="password" value="Password" onfocus="this.value=\'\';" onblur="if (this.value == \'\') {this.value =\'\';}">';
							echo '	<input name ="btnLogin" type="submit" value="Go" >';
							echo '</form>';
							echo '<label>|</label>';
							echo '<a href="registration.php" class="sign-up">Sign Up</a>';
						echo '</div>';
					}
					else{
						echo '<div class="header-grid-right" style="float:right;">';
							
							echo '<a href="logout.php" class="logout">Logout</a>';
							echo '<label style="float:right;position:relative;margin-right:10px;">|</label>';
							echo '<a href="account.php" class="namedisplay">'.$_SESSION["Customer"].'</a>';
						echo '</div>';
					}
				?>
				<!--loginbox and my account-->
				
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="container">
		<div class="header-bottom">			
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" alt=" " ></a>
				</div>
					<div class="ad-right">
					<img class="img-responsive" src="images/ad.png" alt=" " >
				</div>
				<div class="clearfix"> </div>
			</div>	
			<div class="header-bottom-bottom">
				<div class="top-nav">
					<span class="menu"> </span>
					<ul>
						<li class="active"><a href="index.php">HOME </a></li>
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop Category <span class="caret"></span></a>
						  <ul class="dropdown-menu">
						  <?php
								require "connection.php";	
								
								$query2 = "select * from Category";
								$result2 =	oci_parse($conn, $query2);
								oci_execute($result2);	
								$rowCount = 1;
								
								while($row2 = oci_fetch_array($result2)){
									
									
									echo '<li class="bottomdropdown"><a href="shopcategories.php?id='.$row2['CATEGORY_ID'].'">'.$row2['CATEGORY_NAME'].'</a></li>';
									
									$rowCount++;
								}
							?>
						  </ul>
						</li>
						<?php
							
							$sqlcartdisplay = "select * from CART WHERE PRODUCT_ID IS NOT NULL";
							$resultcartdisplay =	oci_parse($conn, $sqlcartdisplay);
							oci_execute($resultcartdisplay);
							
							$cartNumber = 0;			
							//if the cart is not empty
							while($rowcartdisplay = oci_fetch_assoc($resultcartdisplay)){
								$cartNumber ++;
							}
							
							if(isset($_SESSION['Customer'])){
								echo '<li><a href="cart.php">My Cart [ '.$cartNumber.' ]</a></li>';
							}
						?>
					</ul>	
					
				<script>
					$("span.menu").click(function(){
						$(".top-nav ul").slideToggle(500, function(){
						});
					});
				</script>
					
					<div class="clearfix"> </div>					
				</div>
				
				
				<div class="search">
					<form method="post"  enctype="multipart/form-data" class="myform">
						<input name="txtSearch"type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >
						<input type="submit"  value="">
					</form>
				</div>
				<div class="clearfix"> </div>
				</div>
		</div>
	</div>		
		