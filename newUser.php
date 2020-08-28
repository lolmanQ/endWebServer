<?php
	//signupError 1: username taken
	$signupError = 0;
	$signupError = filter_input(1, 'signupError', FILTER_SANITIZE_NUMBER_INT);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="bulmaswatch.min.css">
	<title>Create user</title>
	<script>
		function CheckUsername(element){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
    				var myObj = JSON.parse(this.responseText);
					console.log(myObj.isAvalible);
					if(myObj.isAvalible){
						document.getElementById("usernameCheckText").classList.add("is-hidden");
						document.getElementById("usernameInput").classList.remove("is-danger");
						document.getElementById("submitButton").removeAttribute("disabled");
					}
					else{
						document.getElementById("usernameCheckText").classList.remove("is-hidden");
						document.getElementById("usernameInput").classList.add("is-danger");
						document.getElementById("submitButton").setAttribute("disabled", "");
					}
    				
				}
			};
			xmlhttp.open("GET", "api/checkUsername.php?username=" + element.value, true);
			xmlhttp.send();
		}

	</script>
</head>
<body class="normalLayout createAccountPage">
	<header>
		<h1>Create account</h1>
	</header>
	<nav class="navbar">
		<section class="navbar-menu">
			<a class="navbar-item" href="index.php">Home</a>
		</section>
	</nav>
	<main>
		<section class="createUserWindow box">
			<form action="createNewUser.php" method="post">
				<h2 class="title is-4">Create user</h2>
				<p id="usernameCheckText" class="has-text-centered is-hidden">Username has been taken</p>
				<input id="usernameInput" class="input is-primary" type="text" id="uname" name="username" placeholder="Username" required oninput="CheckUsername(this)">
				<input class="input is-primary" type="password" id="password" name="password" placeholder="Password" required>
				<button id="submitButton" class="button is-primary" type="submit">Create account</button>
				<?php
					if($signupError == 1){
						echo "<p class='has-text-centered'>Username has been taken</p>";
					}
				?>
			</form>
			<a href="loginPage.php">Login</a>
		</section>
		
	</main>
	<footer class="footer">
		<p class="has-text-centered">Made by Elias Böök</p>
	</footer>
</body>
</html>

	