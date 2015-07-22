<?php
	require 'oci_connect.php';
	//$query_str = "INSERT INTO TEST (USERID, USERNAME, PASSWORD) VALUES (4, 'ram', 'password')";
	//$query_str = "UPDATE TEST SET USERNAME = 'UTSAVLAMA', PASSWORD = '12345' ";
	//$query_str = "DELETE FROM TEST WHERE USERID = 8";
	$query_str = "SELECT * FROM TEST";
	$stid = oci_parse($conn, $query_str);
	oci_execute($stid);
	
	echo '<table border="2">';
	while ($row = oci_fetch_assoc($stid)){
		echo '<tr>';
			echo '<td>' . $row['USERID'] . '</td>';
			echo '<td>' . $row['USERNAME'] . '</td>';
			echo '<td>' . $row['PASSWORD'] . '</td>';
		echo '</tr>';
	}
	echo '</table>';
?>