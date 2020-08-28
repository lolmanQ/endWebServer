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

	if(!($_SESSION["userPrivliges"] == "user")){
		header('Location: index.php');
	}

	$orderID = filter_input(1, 'orderID', FILTER_SANITIZE_NUMBER_INT);

	$amount = $_POST['amount'];

	$sql = "UPDATE usertest.orders SET `amount` = '$amount' WHERE (`orderID` = '$orderID');";
	
	if($conn->query($sql) === TRUE){
		echo "New record created successfully";
		header('Location: orderManager.php');
	}
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>