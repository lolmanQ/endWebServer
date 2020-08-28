<?php
	require('includes/DB.php');
	$db = new DB();
	$conn = $db->getConn();
	session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="bulmaswatch.min.css">
	<title>User page</title>
</head>
<body class="normalLayout">
	<header>
		<h1>User page</h1>
	</header>
	<?php include_once "components/navbar.php"; ?>
	<main>
		<section>
			
		</section>
	</main>
	<footer class="footer">
		<p class="has-text-centered">Made by Elias Böök</p>
	</footer>
</body>
</html>