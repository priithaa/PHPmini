<?php 

include('essential/header.php')
 ?>


 <div class="announce">
 	<h2>Sign Up</h2>
 	<form action="includes/signup.inc.php" method="post">

 		<input type="text" name="Name" placeholder="Full Name">
 		<br>
 		<input type="text" name="Email" placeholder="E-Mail">
 		<br>
 		<input type="text" name="Username" placeholder="username">
 		<br>
 		<input type="password" name="pwd" placeholder="type password">
 		<br>
 		<input type="password" name="rpwd" placeholder="re-type password">
 		<br>
 		<button type="submit" name ="submit">
 			Submit
 		</button>
 		
 	</form>

 

 <!-- Check for get methods -->
 <?php 

 	if(isset($_GET["error"]))
 	{
 		 if($_GET["error"]=="emptyinput")
 		 	echo "<p>Please fill all the fields</p>";
 		 elseif($_GET["error"]=="invalidUid")
 		 	echo "<p>Username is invalid</p>";
 		 elseif($_GET["error"]=="invalidEmail")
 		 	echo "<p>Email is invalid</p>";
 		 elseif($_GET["error"]=="pwderror")
 		 	echo "<p>Passwords dont match</p>";
 		 elseif($_GET["error"]=="usernametaken")
 		 	echo "<p>Username is taken</p>";
 		 elseif($_GET["error"]=="stmtfailed")
 		 	echo "<p>Something went wrong</p>";
 		 elseif($_GET["error"]=="stmtfaileduid")
 		 	echo "<p>Something went wrong</p>";



 	}



  ?>

  </div>

 <?php 
	 include('essential/footer.php');
 ?>
