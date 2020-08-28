<?php
	require('../includes/DB.php');
	$db = new DB();
	$conn = $db->getConn();

	$userID = filter_input(1, 'userID', FILTER_SANITIZE_NUMBER_INT);

	$sql = "DELETE FROM usertest.user where `userID` = '$userID';";

	if($conn->query($sql) === TRUE){
		$sql = "DELETE FROM `usertest`.`orders` WHERE (`userID` = '$userID');";
		if($conn->query($sql) === TRUE){
			echo "New record created successfully";
			header('Location: ../admin.php');
		}
		else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>