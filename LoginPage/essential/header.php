<?php 
	
	session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Cute Website
	</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="" href="css/styles.css">
</head>
<body>
	<nav>
		<a href="index.php">CUTE</a>
		<ul>
			
			<li><a href="index.php">Home</a></li>
			<li><a href="">Blog</a></li>
			<?php
			if(isset($_SESSION["usersuid"])) 
			{

					
					echo "<li><a href='includes/logout.inc.php'>Logout</a></li>";
					echo "<li><a href='profile.php'>Profile Page</a></li>";
					
			}
			
			else
			{
				echo "<li><a href='signup.php'>Sign Up</a></li>";
				echo "<li><a href='login.php'>Login</a></li>";

			}
			

			?>
		</ul>
	</nav>