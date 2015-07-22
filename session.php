 
 <?php
	session_start();
	if(!isset($_SESSION['UserName']))
	{
		header('Location:login.php');	
	}

?>