<!--Header -->
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
					<a class="navbar-brand" href="#">
						
					</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
				  <ul class="nav navbar-nav">
					<li></li>
					<li class="active"><a href="../dashboard/dashboard.php">Home </a></li>
					<li><a href="../orders/order.php">Orders</a></li>
					<li><a href="../product/Product.php">Products</a></li>
					<?php
						
						if(isset($_SESSION['Shop'])){
									echo '<li><span style="color:white; font-weight:bold;font-family:Open Sans;">Welcome, '.$_SESSION["Shop"].'</span></li><li><a href="../logout.php">Logout</a></li>';
								}
					?>
					
				  </ul>
				</div><!--/.nav-collapse -->
			  </div>
			</nav>
		</div><!--//Header -->