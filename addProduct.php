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

	$name = $_POST['name'];
	$cost = $_POST['cost'];
	$imgPath = $_POST['imgPath'];

	if($imgPath === ""){
		$imgPath = "default";
	}

	$sql = "INSERT INTO `products`(`productID`, `name`, `cost`, `img`) VALUES (null, '$name',$cost,'$imgPath')";
	if($conn->query($sql) === TRUE){
		echo "New record created successfully";
		header('Location: productManager.php');
	}
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>