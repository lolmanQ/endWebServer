<?php
	require('includes/DB.php');
	$db = new DB();
	$conn = $db->getConn();
	session_start();

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	if($_SESSION['userlogin'] == NULL){
		header('Location: index.php');
	}

	if(!($_SESSION["userPrivliges"] == "manager" || $_SESSION["userPrivliges"] == "admin")){
		header('Location: index.php');
	}
	
	$productID = filter_input(1, 'productID', FILTER_SANITIZE_NUMBER_INT);

	$sql = "DELETE FROM `usertest`.`products` WHERE (`productID` = '$productID');";

	if($conn->query($sql) === TRUE){
		$sql = "DELETE FROM `usertest`.`orders` WHERE (`productID` = '$productID');";
		if($conn->query($sql) === TRUE){
			echo "New record created successfully";
	
			header('Location: productManager.php');
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