<?php require 'session.php'; ?>
<?php
include_once 'connection.php';

if(isset($_REQUEST['id']))
{		
    $id=$_REQUEST['id'];
	$query = "DELETE FROM CART WHERE PRODUCT_ID = $id";
	$result = oci_parse($conn, $query);
	oci_execute($result);
	if(oci_parse($conn, $query))
    {
		//echo "Data inserted Successfully<hr>";	        
        header("location:cart.php");
    }	
}
?>