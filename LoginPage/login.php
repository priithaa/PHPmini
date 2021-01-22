<?php 

include('essential/header.php')
 ?>


 <div class="announce">
 	<h2>Login</h2>
 	<form action="includes/login.inc.php" method="post">

 		<input type="text" name="Name" placeholder="Username/Email">
 		<br>
 		<input type="password" name="pwd" placeholder="type password">
 		<br>
 		<button type="submit" name ="submit">
 			Log In
 		</button>
 		
 	</form>
 	<?php 

 	if(isset($_GET['error']))
 	{	if($_GET["error"]=="emptyinput")
 		 	echo "<p>Please fill all the fields</p>";
 		else if($_GET['error']=="usernotfound")
 			echo "<p>User Not Found!</p>";
 	
 	}

 	 ?>

 </div>


<?php 
	 include('essential/footer.php');
 ?>
