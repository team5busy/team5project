<?php

	// Create connection
    $conn = oci_connect('TEAM5','vijaya01','localhost/XE');
    // Check connection
    
	//connect to oracle database
	if($conn = oci_connect('TEAM5','vijaya01','localhost/XE')){
		echo "";
	}
	else{
		echo "Connection Unsuccessful";
	}
?>
