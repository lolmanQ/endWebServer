<?php
	require('../includes/DB.php');
	$db = new DB();
	$conn = $db->getConn();
	session_start();

	if($_SESSION['userPrivliges'] == "admin"){
		$userID = $_POST['userID'];
		$privlige = $_POST['privliges'];

		$sql = "UPDATE usertest.user SET `privliges` = '$privlige' WHERE userID = '$userID';";

		if($conn->query($sql) === TRUE){
			echo "Record successfully updated";
		}
		else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}
?>