
<?php 
	include("connection.php");	//include connection
	

	
	
	$error_msg = '';
	
	
?>
<div class="header">
		<div class="header-top">
			<div class="container">
				<div class="header-grid">
					<ul>
						<li ><a href="articles.php" class="scroll">Category</a></li>
						<li><a href="shop/shop.php" class="scroll">Shop</a></li>	
						<li><a href="staff/staff.php" class="scroll">Staff</a></li>	
						<li><a href="customer/customer.php" class="scroll">Customer</a></li>	
					</ul>
				</div>
				
				<!--loginbox and my account-->
				<?php
					if(isset($_SESSION['superadmin'])){
						echo '<div class="header-grid-right" style="float:right;">';
							
							echo '<a href="logout2.php" class="logout">Logout</a>';
							echo '<label style="float:right;position:relative;margin-right:10px;">|</label>';
							echo '<a href="account.php" class="namedisplay">'.$_SESSION["superadmin"].'</a>';
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
					<a href="index.php"><img src="../images/logo.png" alt=" " ></a>
				</div>
					<div class="ad-right">
					<img class="img-responsive" src="../images/ad.png" alt=" " >
				</div>
				<div class="clearfix"> </div>
			</div>	
			<div class="header-bottom-bottom">
				<div class="top-nav">
					<span class="menu"> </span>
					<ul>
						<?php
							//home
							if($_SERVER['REQUEST_URI']=='/bishal/admin/dashboard/dashboard.php'){
								echo '<li class="active"><a href="dashboard/dashboard.php">HOME </a></li>';
								
							}	
							//category
							elseif($_SERVER['REQUEST_URI']=='/bishal/admin/category/category.php'){
								echo '<li><a href="dashboard/dashboard.php">HOME </a></li>';
								echo '<li><a href="category/category_add.php">CATEGORY ADD </a></li>';
								echo '<li><a href="category/category_list.php">CATEGORY LIST </a></li>';
							}
							elseif($_SERVER['REQUEST_URI']=='/bishal/admin/category/category_add.php'){
								echo '<li><a href="dashboard/dashboard.php">HOME </a></li>';
								echo '<li class="active"><a href="category/category_add.php">CATEGORY ADD </a></li>';
								echo '<li><a href="category/category_list.php">CATEGORY LIST </a></li>';
							}
							elseif($_SERVER['REQUEST_URI']=='/bishal/admin/category/category_list.php'){
								echo '<li><a href="dashboard/dashboard.php">HOME </a></li>';
								echo '<li><a href="category/category_add.php">CATEGORY ADD </a></li>';
								echo '<li class="active"><a href="category/category_list.php">CATEGORY LIST </a></li>';
							}
							//shop
							elseif($_SERVER['REQUEST_URI']=='/bishal/admin/shop/shop.php'){
								echo '<li><a href="index.php">HOME </a></li>';
								echo '<li><a href="shop/shop_add.php">SHOP ADD </a></li>';
								echo '<li><a href="shop/shop_list.php">SHOP LIST </a></li>';
								
							}
							elseif($_SERVER['REQUEST_URI']=='/bishal/admin/shop/shop_add.php'){
								echo '<li><a href="index.php">HOME </a></li>';
								echo '<li class="active"><a href="shop/shop_add.php">SHOP ADD </a></li>';
								echo '<li><a href="shop/shop_list.php">SHOP LIST </a></li>';
								
							}
							elseif($_SERVER['REQUEST_URI']=='/bishal/admin/shop/shop_list.php'){
								echo '<li><a href="index.php">HOME </a></li>';
								echo '<li><a href="shop/shop_add.php">SHOP ADD </a></li>';
								echo '<li class="active"><a href="shop/shop_list.php">SHOP LIST </a></li>';
								
							}
							
							//staff
							elseif($_SERVER['REQUEST_URI']=='/bishal/admin/staff/staff.php'){
								echo '<li><a href="index.php">HOME </a></li>';
								echo '<li><a href="staff/staff_add.php">STAFF ADD </a></li>';
								echo '<li><a href="staff/staff_list.php">STAFF LIST </a></li>';
								
							}
							elseif($_SERVER['REQUEST_URI']=='/bishal/admin/staff/staff_add.php'){
								echo '<li><a href="index.php">HOME </a></li>';
								echo '<li class="active"><a href="staff/staff_add.php">STAFF ADD </a></li>';
								echo '<li><a href="staff/staff_list.php">STAFF LIST </a></li>';
								
							}
							elseif($_SERVER['REQUEST_URI']=='/bishal/admin/staff/staff_list.php'){
								echo '<li><a href="index.php">HOME </a></li>';
								echo '<li><a href="staff/staff_add.php">STAFF ADD </a></li>';
								echo '<li class="active"><a href="staff/staff_list.php">STAFF LIST </a></li>';
								
							}
							//customer
							elseif($_SERVER['REQUEST_URI']=='/bishal/admin/customer/customer.php'){
								echo '<li><a href="index.php">HOME </a></li>';
								echo '<li><a href="customer/customer_list.php">CUSTOMER LIST </a></li>';
							}
							elseif($_SERVER['REQUEST_URI']=='/bishal/admin/customer/customer_list.php'){
								echo '<li><a href="index.php">HOME </a></li>';
								echo '<li class="active"><a href="customer/customer_list.php">CUSTOMER LIST </a></li>';
							}
							else{
								echo '<li><a href="dashboard/dashboard.php">HOME </a></li>';
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
		