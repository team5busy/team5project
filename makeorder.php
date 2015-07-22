<?php session_start();
									
								require "connection.php";
								$query3 = "select * from CART where CUSTOMER_ID = '".$_SESSION['Customer']."' ";                    
									
								$result3 =	oci_parse($conn, $query3);
								oci_execute($result3);
								$rowCount = 1;
								while($row3 = oci_fetch_assoc($result3))
								{		
									
									//establish connection
										require 'connection.php';
										
										$query99 = "select * from CART WHERE PRODUCT_ID IS NOT NULL";
										$result99 =	oci_parse($conn, $query99);
										oci_execute($result99);
										$rowCount = 1;
										$rowNum = oci_num_rows($result99);	
										
										$query22 = "select * from CUSTOMERORDER WHERE PRODUCT_ID IS NOT NULL";
										$result22 =	oci_parse($conn, $query22);
										oci_execute($result22);
										$rowNum = oci_num_rows($result22);
										$row22 = oci_fetch_assoc($result22);
										
										//if the cart is empty
										if(!$row22){
													$sql = "INSERT INTO CUSTOMERORDER(	
																				PRODUCT_ID,
																				CUSTOMER_USERNAME,
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
																".$row3['QUANTITY']."
															)";
															$result =	oci_parse($conn, $sql);
													if (oci_execute($result)) {
														$url = "paypal.php?disableid='disabled'";		
														header('Location:'.$url.'');
													}					
													else
														echo "Error: " . $sql . "<br>" . oci_error($conn);
										}	
										while($row99 = oci_fetch_assoc($result99))
										{
											if($row22['PRODUCT_ID']==$row3['PRODUCT_ID']){
												$sql ="UPDATE CUSTOMERORDER SET QUANTITY = QUANTITY +".$row3['QUANTITY']." where PRODUCT_ID=".$row3['PRODUCT_ID']."";
												$rowCount =$rowCount++;
												
												$result =	oci_parse($conn, $sql);
										
												if (oci_execute($result)) { 
													$url = "paypal.php?disableid='disabled'";	
													header('Location:'.$url.'');
												}					
												else{
													echo "Error: " . $sql . "<br>" . oci_error($conn);
												}
												
											}
												
											if($row22['PRODUCT_ID']!=$row3['PRODUCT_ID']){
												echo "if(".$row99['PRODUCT_ID']."!=".$row3['PRODUCT_ID']."){";//test
												$sql = "INSERT INTO CUSTOMERORDER(	
																			PRODUCT_ID,
																			CUSTOMER_USERNAME,
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
															".$row3['QUANTITY']."
														)";
												$result =	oci_parse($conn, $sql);
										
												if (oci_execute($result)) { 
													$url = "paypal.php?disableid='disabled'";	
													header('Location:'.$url.'');
												}					
												else{
													echo "Error: " . $sql . "<br>" . oci_error($conn);
												}
											}
											
											
										}
								}
?>