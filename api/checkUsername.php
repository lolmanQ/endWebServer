<?php

	require('../includes/DB.php');
	error_reporting(0);
	$db = new DB();
	$conn = $db->getConn();

	$username = filter_input(1, 'username', FILTER_SANITIZE_STRING);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT username FROM usertest.user WHERE username = '$username'";

	if($result = mysqli_query($conn, $sql)){
		if(mysqli_num_rows($result) > 0){
			$returnObj->isAvalible = false;
		}
		else{
			$returnObj->isAvalible = true;
		}
	
		$returnJSON = json_encode($returnObj);
	
		echo $returnJSON;
	}

	
	

?>