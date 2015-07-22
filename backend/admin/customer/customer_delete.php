<?php require '../session.php'; ?>
<?php
include_once '../connection.php';

if(isset($_REQUEST['id']))
{		
    $id=$_REQUEST['id'];
	$query = "DELETE FROM user WHERE UserID = $id";
	
	if(mysqli_query($conn, $query))
    {
		//echo "Data inserted Successfully<hr>";	        
        header("location:user_list.php");
    }	
}
?>