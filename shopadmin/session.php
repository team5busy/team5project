 
 <?php
	session_start();
	if(!isset($_SESSION['Shop']))
	{
		header('Location:../index.php');	
	}

?>