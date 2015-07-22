<?php
								session_start();
								require "connection.php";
								$query3 = "select * from PRODUCT where PRODUCT_ID= '".$_REQUEST['id']."'";                    
									
								$result3 =	oci_parse($conn, $query3);
								oci_execute($result3);
								$rowCount = 1;
								while($row3 = oci_fetch_assoc($result3))
								{

									if(isset($_POST['btncart'])){
										//establish connection
										require 'connection.php';
										
										$query99 = "select * from CART WHERE PRODUCT_ID IS NOT NULL";
										$result99 =	oci_parse($conn, $query99);
										oci_execute($result99);
										$rowCount = 1;
										$rowNum = oci_num_rows($result99);	
										
										$query22 = "select * from CART WHERE PRODUCT_ID IS NOT NULL";
										$result22 =	oci_parse($conn, $query22);
										oci_execute($result22);
										$rowNum = oci_num_rows($result22);
										$row22 = oci_fetch_assoc($result22);
										
										//if the cart is empty
										if(!$row22){
													$sql = "INSERT INTO CART(	
																				PRODUCT_ID,
																				CUSTOMER_ID,
																				PRODUCT_NAME,
																				PRODUCT_IMAGE,
																				SHOP_ID,
																				MANUFACTURER,
																				PRICE,
																				QUANTITY
																			)	
													VALUES (
																".$row3['PRODUCT_ID'].",
																'".$_SESSION["Customer"]."',
																'".$row3['PRODUCT_NAME']."',
																'".$row3['PRODUCT_IMAGE']."',
																'".$row3['SHOP_ID']."',
																'".$row3['MANUFACTURER']."',
																".$row3['PRICE'].",
																".$_POST['txtQuantity']."
															)";
															$result =	oci_parse($conn, $sql);
													if (oci_execute($result)) { 
													}					
													else
														echo "Error: " . $sql . "<br>" . oci_error($conn);
										}	
										while($row99 = oci_fetch_assoc($result99))
										{
											if($row99['PRODUCT_ID']==$row3['PRODUCT_ID']){
												$sql ="UPDATE CART SET QUANTITY = QUANTITY +".$_POST['txtQuantity']." where PRODUCT_ID=".$row3['PRODUCT_ID']."";
												$rowCount =$rowCount++;
												
												$result =	oci_parse($conn, $sql);
										
												if (oci_execute($result)) { 
												}					
												else{
													echo "Error: " . $sql . "<br>" . oci_error($conn);
												}
												
											}
												
											if($row99['PRODUCT_ID']!=$row3['PRODUCT_ID']){
												echo "if(".$row99['PRODUCT_ID']."!=".$row3['PRODUCT_ID']."){";//test
												$sql = "INSERT INTO CART(	
																			PRODUCT_ID,
																			CUSTOMER_ID,
																			PRODUCT_NAME,
																			PRODUCT_IMAGE,
																			SHOP_ID,
																			MANUFACTURER,
																			PRICE,
																			QUANTITY
																		)	
												VALUES (
															".$row3['PRODUCT_ID'].",
															'".$_SESSION["Customer"]."',
															'".$row3['PRODUCT_NAME']."',
															'".$row3['PRODUCT_IMAGE']."',
															'".$row3['SHOP_ID']."',
															'".$row3['MANUFACTURER']."',
															".$row3['PRICE'].",
															".$_POST['txtQuantity']."
														)";
												$result =	oci_parse($conn, $sql);
										
												if (oci_execute($result)) { 
												}					
												else{
													echo "Error: " . $sql . "<br>" . oci_error($conn);
												}
											}
											
											
										}

										
									}//if(isset($_POST['btncart']))
								}

?>
<!DOCTYPE html>
<html>
<head>
<title>Bishal Bazaar | Home </title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/transition.js"></script>
<script src="js/dropdown.js"></script>
<script src="js/collapse.js"></script>

<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/styleedit.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/animate.css" rel="stylesheet" type="text/css"  media="all" />		
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

<link rel="stylesheet" href="css/etalage.css">
<script src="js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
<!-- the jScrollPane script -->
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script> 



</head>
<body> 
	<!--header-->
		<?php require "header.php"; ?>
	<!--header-->	
		
	<!--content-->
	<div class="content">
		
		
			<div class="container">
				<div class="single">
				<div class="col-md-9">
					<div class="single_grid">
						<?php
						
							if(isset($_REQUEST['id'])){
							require "connection.php";
							$query3 = "select * from PRODUCT where PRODUCT_ID= '".$_REQUEST['id']."'";                    
									
								$result3 =	oci_parse($conn, $query3);
								oci_execute($result3);
								$rowCount = 1;
								while($row3 = oci_fetch_assoc($result3))
								{
									echo '<form method="post"  enctype="multipart/form-data" class="myform">';
									echo '<div class="grid images_3_of_2">';
											echo '<ul id="etalage">';
												echo '<li>';
												echo '	<a href="optionallink.html">';
													echo '	<img class="etalage_thumb_image img-responsive" src="admin/customer/'.$row3['PRODUCT_IMAGE'].'" alt="" >';
													echo '	<img class="etalage_source_image img-responsive" src="admin/customer/'.$row3['PRODUCT_IMAGE'].'" alt="" >';
													echo '</a>';
												echo '</li>';
											echo '</ul>';
											echo ' <div class="clearfix"> </div>		';
									 echo ' </div> ';
									  //----
									echo '  <div class="span1_of_1_des">';
									 echo ' <div class="desc1">';
									echo '	<h3>'.$row3['PRODUCT_NAME'].'</h3>';
									echo '	<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>';
									echo '	<h5>NRs. '.$row3['PRICE'].'<a href="#">click for offer</a></h5>';
										echo '<div class="available">';
										echo '	<h4>Available Options :</h4>';
										echo '	<ul>';
												echo '<li>Quantity:';
												echo '		<input type="number" name="txtQuantity" value = "1" min="1" max="12">';
												echo '</li>';
											echo '</ul>';
											echo '<div class="form-in">';
											echo '	<input name="btncart" onclick="return ConfirmDelete()"class="btn" type="submit" value="Add To Cart">';
											echo '</div>';
											echo '<div class="clearfix"></div>';
										echo '</div>';
										
									echo ' </div>';
									echo '</div>';
									echo '<div class="clearfix"></div>';
									echo '</form>';
								
								
									
								}
								
							}	
						?>
						
					</div>
					   
						<!----- tabs-box ---->
				<div class="sap_tabs">	
							 <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
								  <ul class="resp-tabs-list">
									  <li class="resp-tab-item " aria-controls="tab_item-0" role="tab"><span>Product Description</span></li>
									  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Additional Information</span></li>
									  <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Reviews</span></li>
									  <div class="clearfix"></div>
								  </ul>				  	 
									<div class="resp-tabs-container">
										<h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span>Product Description</h2><div class="tab-1 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">
											<div class="facts">
											  <p > There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined </p>
												<ul>
													<li>Research</li>
													<li>Design and Development</li>
													<li>Porting and Optimization</li>
													<li>System integration</li>
													<li>Verification, Validation and Testing</li>
													<li>Maintenance and Support</li>
												</ul>         
											</div>
											</div>
										  <h2 class="resp-accordion" role="tab" aria-controls="tab_item-1"><span class="resp-arrow"></span>Additional Information</h2><div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
											<div class="facts">									
												<p > Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections </p>
												<ul >
													<li>Multimedia Systems</li>
													<li>Digital media adapters</li>
													<li>Set top boxes for HDTV and IPTV Player applications on various Operating Systems and Hardware Platforms</li>
												</ul>
											</div>	
										</div>									
										  <h2 class="resp-accordion" role="tab" aria-controls="tab_item-2"><span class="resp-arrow"></span>Reviews</h2><div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
											 <div class="facts">
											  <p > There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined </p>
												<ul>
													<li>Research</li>
													<li>Design and Development</li>
													<li>Porting and Optimization</li>
													<li>System integration</li>
													<li>Verification, Validation and Testing</li>
													<li>Maintenance and Support</li>
												</ul>     
										 </div>	
									 </div>
								  </div>
							 </div>
							 <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
					<script type="text/javascript">
						$(document).ready(function () {
							$('#horizontalTab').easyResponsiveTabs({
								type: 'default', //Types: default, vertical, accordion           
								width: 'auto', //auto or any width like 600px
								fit: true   // 100% fit in a container
							});
						});
					   </script>	

			</div>
			</div>
			<!---->
			
		   <div class="clearfix"> </div>
			</div>
			</div>
		
		
	</div><!--content-->
	<!---->
	
	<!--footer-->
	<?php require "footer.php";?>
	<!--footer-->
	
</body>
</html>