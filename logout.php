<?php
	session_start();
 
	session_destroy(); //This destroy all the sessions  
 
	unset($_SESSION['userlogin']); //if you want to destroy only users login session  
	unset($_SESSION["userPrivliges"]);
	unset($_SESSION["userID"]);
	echo "you have logged out";
	header('Location: index.php');
?>