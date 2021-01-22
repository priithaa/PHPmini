<?php 
	include('essential/header.php')
 ?>

	<div class="announce">

		<?php 
		if (isset($_SESSION["usersuid"])) {

			echo "<h1> Hello ".$_SESSION["usersuid"]."!!</h1>";
		 	# code...
		 } ?>
		<h2>This is an Introduction</h2>

		<p>Here is an important paragraph that is probably needed</p>

		<h2>Here is some exciting stuff</h2>
		
	</div>
	
	<div class="row">
		<div class="col-md-3 m-8 p-8">
			<div class="square"><h3>Serious Stuff</h3></div>
 		</div>
		<div class="col-md-3 m-8 p-8">
			<div class="square"><h3>Cute Stuff</h3></div>		
			</div>
		<div class="col-md-3 m-8 p-8">
			<div class="square"><h3>Boring Stuff</h3></div>		
			</div>
		<div class="col-md-3 m-8 p-8">
			<div class="square"><h3>Morbid Stuff</h3></div>		
			</div>
	</div>

	
<?php 
	 include('essential/footer.php');
 ?>
