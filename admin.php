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

	if(!($_SESSION["userPrivliges"] == "admin")){
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
	<title>Admin page</title>
	<script>
		async function ChangeUserPrivliges(element, userID){
			let data = "userID="+ userID +"&privliges=" + element.selectedOptions[0].value;
			let response = await fetch("api/changeUserPrivliges.php", {
				headers: {
					"Content-Type": "application/x-www-form-urlencoded"
				},
				method: "POST",
				body: data
				});
			console.log(response);
		}
		function DeleteUser(userID){
			window.location = "api/deleteUser.php?userID=" + userID;
		}
	</script>
</head>
<body class="normalLayout adminPage">
	<header>
		<h1>Admin page</h1>
	</header>
	<?php include_once "components/navbar.php"; ?>
	<main>
		<section>
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Privlage</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php
					$sql = "SELECT * FROM usertest.user;";
					if($result = mysqli_query($conn, $sql)){
						while($row = $result->fetch_assoc()){
							$userID = $row['userID'];
							$username = $row['username'];
							$privliges = $row['privliges'];

							$options = array( 'user', 'manager', 'admin' );

							$output = '';
							for( $i=0; $i<count($options); $i++ ) {
								$output .= "<option value={$options[$i]} " 
								. ( $privliges == $options[$i] ? 'selected="selected"' : '' ) . '>' 
								. $options[$i] 
								. '</option>';
							}

							echo"
								<tr>
									<th>$userID</th>
									<td>$username</td>
									<td>
										<select class='select'oninput='ChangeUserPrivliges(this,$userID)'>
											$output
										</select>
									</td>
									<td><button class='button is-danger' onclick='DeleteUser($userID)'>Delete</button></td>
								</tr>
							";
						}
					}

				?>
				</tbody>
			</table>
		</section>
	</main>
	<footer class="footer">
		<p class="has-text-centered">Made by Elias Böök</p>
	</footer>
</body>
</html>