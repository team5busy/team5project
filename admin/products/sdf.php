<html>
	<head> 
		<title> Form 1 </title>
		<link rel="stylesheet" type="text/css" href="../admin/css/admin_style.css"/>
	</head>
	
	<body> 
    
	   	
        <div id="container">
        	<?php include "../admin/includes/admin_header.php"; ?>
        	<?php include "../admin/includes/admin_left.php"; ?>
        	<div id="main">
		        <h4 style="padding-left: 200px;"><a href="product_list.php"> List Product </a></h4> 
		        <h3> Add Product </h3>
				<form method="post" name="f1" enctype="multipart/form-data">
				<table cellspacing="10px">           
					<tr>
						<td width="150px"> Category </td>
						<td> 
                        	<select name="category"> 
                            	<?php
									$conn = mysqli_connect("localhost", "root", "root", "mydb1");
									// Check connection
									if (!$conn) {
										die("Connection failed: " . mysqli_connect_error());
									}
									$query = "Select CategoryName from category;";                    
									$result = mysqli_query($conn, $query);	
												
									while($row = mysqli_fetch_assoc($result))
									{
									echo "<option value='". $row['CategoryName']."'>".$row['CategoryName']."</option><br 									/>";
									}
                      			?>
                            </select>
                        </td>
                     
					</tr>
					<tr>				
						<td> Product Name </td>
						<td> <input type="text" name="productName">  </td>
					</tr>
					<tr>
                    	<td>Product description</td>
                        <td><textarea rows="5" cols="30" name="productDesc"></textarea></td>
                    </tr>
                    <tr>
                    	<td>Price:</td>
                        <td><input type = "text" name = "productPrice"></td>
                    </tr>
                      <tr>
                        <td>File:</td>
                        <td><input type="file" name="filep" size=45></td>
                        </tr>
					<tr>				
						<td>&nbsp;  </td>
						<td> <input name="btnSave" type="submit" value="Save"> </td>
					</tr>
					
				</table>
				</form>
			</div>
			
			<?php include "../admin/includes/admin_footer.php"; ?>
		</div>
	
	</body>

</html>

<?php		
        
    if(isset($_POST['btnSave']))
    { 		
			
        // Create connection
        $conn = mysqli_connect("localhost", "root", "root", "mydb1");
        // Check connection
        if (!$conn) 
            die("Connection failed: " . mysqli_connect_error());
    	echo $_POST['category'];
	
        $pname = $_POST['productName'];
    	$pdescription = $_POST['productDesc'];
		$pprice = $_POST['productPrice'];
    	$sql = "INSERT INTO product( ProductName, ProductImageName, ProductDescription, Price) 
                VALUES ('$pname','".$_FILES['filep']['name']."','$pdescription', '$pprice')";
				
		//move uploaded file to folder images
		$folder = "../images/";
			move_uploaded_file($_FILES["filep"]["tmp_name"] , "$folder".$_FILES["filep"]["name"]);
    
        if (mysqli_query($conn, $sql))
            echo "New record inserted successfully";         
        else
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);                  	
	}
?>