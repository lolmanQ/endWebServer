<?php
	//loginError 1: incorrect password
	//loginError 2: incorrect username
	$loginError = 0;
	$loginError = filter_input(1, 'loginError', FILTER_SANITIZE_NUMBER_INT);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="bulmaswatch.min.css">
	<title>Login</title>
</head>
<body class="loginPage normalLayout">
	<header>
		<h1>Login</h1>
	</header>
	<nav class="navbar">
		<section class="navbar-menu">
			<a class="navbar-item" href="index.php">Home</a>
		</section>
	</nav>
	<main>
		<section class="loginWindow box">
			<form action="login.php" method="post">
				<input required class="input is-primary" type="text" name="username" id="username" placeholder="Username">
				<input required class="input is-primary" type="password" name="password" id="password" placeholder="Password">
				<button class="button is-primary" type="submit">Login</button>
				<?php
					if($loginError == 1){
						echo "<p class='has-text-centered'>Incorrect password</p>";
					}
					else if($loginError == 2){
						echo "<p class='has-text-centered'>Incorrect username</p>";
					}
				?>
			</form>
			<a href="newUser.php">Create new user</a>
		</section>
	</main>
	<footer class="footer">
		<p class="has-text-centered">Made by Elias Böök</p>
	</footer>
</body>
</html>