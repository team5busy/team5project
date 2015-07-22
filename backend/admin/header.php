<div>
			<!-- Fixed navbar -->
			<nav class="navbar navbar-default navbar-fixed-top">
			  <div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					
				</div>
				<div id="navbar" class="navbar-collapse collapse">
				  <ul class="nav navbar-nav">
					
					<li class="active"><a href="../dashboard/dashboard.php">Home </a></li>
					<li><a href="../shop/shop.php">Shop</a></li>
					<li><a href="../staff/staff.php">Staff</a></li>
					<li><a href="../customer/customer.php">Customer</a></li>
					<li><a href="../products/products.php">Products</a></li>
					<li><a href="../category/category.php">Category</a></li>
					
					<?php
						
						if(isset($_SESSION['superadmin'])){
									echo '<li><span style="color:white; font-weight:bold;font-family:Open Sans;">Welcome, '.$_SESSION["superadmin"].'</span></li><li><a href="../logout.php"><input type="button" class="btn" value="logout"></a></li>';
								}
					?>
					
				  </ul>
				</div><!--/.nav-collapse -->
			  </div>
			</nav>
		</div>