<?php
	require('includes/DB.php');
	$db = new DB();
	$conn = $db->getConn();

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	session_start();
	
	if($_SESSION['userlogin'] == NULL){
		header('Location: index.php');
	}

	if(!($_SESSION["userPrivliges"] == "manager" || $_SESSION["userPrivliges"] == "admin")){
		header('Location: index.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="bulmaswatch.min.css">
	<title>Manage page</title>
</head>
<body class="normalLayout">
	<header>
		<h1>Product managment</h1>
	</header>
	<?php include_once "components/navbar.php"; ?>
	<main>
		<section class="productChanger">
			<?php
				$sql = "SELECT * FROM usertest.products";

				$result = mysqli_query($conn, $sql);
				while($row = $result->fetch_assoc()) {
					echo "
						<section class='product box'>
						<form action='changeProduct.php?productID={$row['productID']}' method='post'>
							<label class='label' for='name'>Name:</label>
							<input class='input' type='text' name='name' id='name' value='{$row['name']}' required>
							<label class='label' for='cost'>Cost:</label>
							<input class='input' type='number' name='cost' id='cost' value='{$row['cost']}' required>
							<label class='label' for='imgPath'>Image path</label>
							<input class='input' type='text' name='imgPath' id='imgPath' value='{$row['img']}'>
							<button class='button is-primary' type='submit'>Change</button>
							<a class='button is-danger' href='deleteProduct.php?productID={$row['productID']}'>Delete</a>
						</form>
						</section>
						";
				}
			?>
			<section class="productAdder box">
				<h2 class="title">Add product</h2>
				<form action="addProduct.php" method="post">
					<label class="label" for="name">Name:</label>
					<input class="input" type="text" name="name" id="name" value="" required>
					<label class="label" for="cost">Cost:</label>
					<input class="input" type="number" name="cost" id="cost" required>
					<label class="label" for="imgPath">Image path</label>
					<input class="input" type="text" name="imgPath" id="imgPath">
					<button class="button is-primary" type="submit">Add</button>
				</form>
			</section>
		</section>
	</main>
	<footer class="footer">
		<p class="has-text-centered">Made by Elias Böök</p>
	</footer>
	
</body>
</html>