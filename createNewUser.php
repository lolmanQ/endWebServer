<?php
	require('includes/DB.php');
	$db = new DB();
	$conn = $db->getConn();

	$state = "false";

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$newUsername = $_POST["username"];
	$newPassword = $_POST["password"];

	$newPassword = hash("sha256", $newPassword);

	$sql = "INSERT INTO `user`(`userID`, `username`, `password`, `privliges`) VALUES (null, '$newUsername','$newPassword','user')";
	if($conn->query($sql) === TRUE){
		echo "New record created successfully";
		header('Location: loginPage.php');
	}
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>