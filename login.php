<?php
	require('includes/DB.php');
	$db = new DB();
	$conn = $db->getConn();
	session_start();

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$_SESSION['loginCount'] = 1 + $_SESSION['loginCount'];


	$userUsername = $_POST["username"];
	$userPassword = $_POST["password"];

	$userPassword = hash("sha256", $userPassword);
	echo strlen($userPassword);

	$sql = "SELECT * FROM usertest.user WHERE username = '$userUsername'";

	$result = mysqli_query($conn, $sql);
	$list = mysqli_fetch_assoc($result);

	echo "database password: {$list['password']}";
	echo "count {count($list)}";
	if(mysqli_num_rows($result) < 1){
		header('Location: loginPage.php?loginError=2');
	}
	else if(count($list) == 0){
		
		header('Location: loginPage.php?loginError=1');
	}
	else if($userPassword == $list['password']){
		$_SESSION['loginCount'] = 0;		
		$_SESSION["userlogin"] = $list['username'];
		$_SESSION["userID"] = $list['userID'];
		$_SESSION["userPrivliges"] = $list['privliges'];
		header('Location: index.php'); 
	}
	else{
		
		header('Location: loginPage.php?loginError=1');
	}
?>