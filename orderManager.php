<?php
	require('includes/DB.php');
	$db = new DB();
	$conn = $db->getConn();
	//error_reporting(0);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	session_start();
	
	if($_SESSION['userlogin'] == NULL){
		header('Location: index.php');
	}

	if(!($_SESSION["userPrivliges"] == "user")){
		header('Location: index.php');
	}
	$userID = $_SESSION['userID'];

	$sqlUserOrders = "SELECT * FROM usertest.orders WHERE userID = $userID";
	$sqlProducts = "SELECT * FROM usertest.products;";

	$productsResult = mysqli_query($conn, $sqlProducts);


	
	while($productRow = mysqli_fetch_assoc($productsResult)){
		$userOrderResult = mysqli_query($conn, $sqlUserOrders);
		$currentProductID = $productRow['productID'];
		$productStatus = false;
		while($orderRow = mysqli_fetch_assoc($userOrderResult)) {
			if($currentProductID == $orderRow['productID']){
				$productStatus = true;
			}
		}
		if(!$productStatus){
			$sql = "INSERT INTO `orders`(`userID`, `productID`, `amount`) VALUES ('$userID', '$currentProductID','0')";
			if(!mysqli_query($conn, $sql)){
				echo "failed to insert empty";
			}
		}
	}
		
	

	

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="bulmaswatch.min.css">
	<title>Order page</title>
</head>
<body class="normalLayout">
	<header>
		<h1>Order manager</h1>
	</header>
	<?php include_once "components/navbar.php"; ?>
	<main>
		<section class="orderTable">
			<?php
				$sql = "SELECT * FROM usertest.products";

				$result = mysqli_query($conn, $sql);
				while($row = $result->fetch_assoc()) {
					$name = $row['name'];
					$cost = $row['cost'];
					$img = $row['img'];
					$productID = $row['productID'];
					$userID = $_SESSION['userID'];

					$sql2 = "SELECT * FROM usertest.orders WHERE (productID = '$productID' AND userID = '$userID' )";
					
					$result2 = mysqli_query($conn, $sql2);
					$list = mysqli_fetch_assoc($result2);
					if($list['amount'] == NULL){
						$amount = 0;
					}
					else{
						$amount = $list['amount'];
					}
					echo "
						<section class='product box'>
							<form action='changeOrder.php?orderID={$list['orderID']}' method='post'>
								<p>Name: $name</p><br>
								<p>Cost: $cost</p><br>
								<img class='productImg' src='images/$img' alt='image of $name'>
								<label class='lable' for='amount'>
								<input class='input' type='number' name='amount' id='amount' value='$amount'>
								<button class='button is-primary' type='submit'>Order</button>
							</form>
						</section>
						";
				}
			?>
		</section>
	</main>
	<footer class="footer">
		<p class="has-text-centered">Made by Elias Böök</p>
	</footer>
</body>
</html>