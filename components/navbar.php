<?php
	if(session_status() != 2){
		session_start();
	}

	$navbarUsername = $_SESSION['userlogin'];
?>
<nav class="navbar">
	<section class="navbar-menu">
		<a class="navbar-item" href="index.php">Home</a></li>
		<?php
		if($_SESSION["userPrivliges"] == "manager" || $_SESSION["userPrivliges"] == "admin"){
			echo '<a class="navbar-item" href="productManager.php">Products</a>';
		}
		if($_SESSION["userPrivliges"] == "user"){
			echo '<a class="navbar-item" href="orderManager.php">Order</a>';
		}
		if($_SESSION['userPrivliges'] == "admin"){
			echo '<a class="navbar-item" href="admin.php">Admin</a>';
		}
		?>
		<section class="userWindow navbar-item has-dropdown is-hoverable">
			<div class="navbar-link"><?php
				if($_SESSION['userlogin'] == NULL){
					echo "User";
				}
				else{
					echo $_SESSION['userlogin'];
				}
			?></div>
			<div class="navbar-dropdown">
				<?php
					if($_SESSION['userlogin'] == NULL){
						echo '<a class="navbar-item" href="loginPage.php">login</a>';
					}
				?>
		
				<?php
					if($_SESSION["userlogin"] != NULL){
						echo "<p class=\"title is-5\">Logged in as: {$_SESSION['userlogin']}</p>";
						echo "<a href='userPage.php'>Profile</a>";
						echo '<a class="button is-danger" href="logout.php">logout</a>';
					}
				?>
			</div>
		</section>
	</section>
</nav>