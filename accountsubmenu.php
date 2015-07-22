<?php 
	session_start();?>
<div class="row">
			<a href="" style="margin-top:1%; margin-left:1%;">
				<!--logo-->
				<div class="logo animated bounceInLeft">
					<!-- Logo and search button animated-->
					<a href="index.php"><img style="float:left;" src="images/logo.png" alt="" /></a>	
					<div class="search" style="float:left;margin-top:30px;">
					<form  name ="formSearch" method='post'>
						<p><b>Search<b></p>
						<input name="txtSearch" type="text" Style="width:100px;height:22.5px;" />
						
						<input type="submit" value="GO" name="btnsearch" class="myButton" style="padding: 0 0 0 0;font-size:16px;height:30px;width:40px;"/>
					</form>
				  </div>	
				</div><!--logo-->
			</a>	
			<!-- submenu -->
			<div class="col-md-8 submenu">
				<ul class="nav navbar-nav">
					<li></li>
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="account.php">Account</a></li>
					<li><a href="cart.php">My Cart</a></li>
					<li><a href="order.php">My Orders</a></li>
				 </ul>
			</div><!-- submenu -->
		</div>