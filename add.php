<?php 

	if(isset($_POST['submit'])){
		/* echo htmlspecialchars($_POST['email']);
		echo htmlspecialchars($_POST['title']);
		echo htmlspecialchars($_POST['ingredients']); */

		// check email
		if (empty($_POST['email'])) {
			echo "Email is required <br />";
		}else{
			echo htmlspecialchars($_POST['email']);
		}

		// check title
		if(empty($_POST['title'])){
			echo "Title is required <br />";
		}else{
			echo htmlspecialchars($_POST['title']);
		}

		// check ingredients
		if (empty($_POST['ingredients'])) {
			echo "At least one ingredient is required";
		}else{
			echo htmlspecialchars($_POST['ingredients']);
		}
		// end of check
	}

 ?>

 <!DOCTYPE html>
 <html>

 	<?php include('templates/header.php'); ?>

 	<section class="container grey-text">
 		<h4 class="center">Add a Pizza</h4>
 		<form class="white" action="add.php" method="POST">
 			<label>Your Email:</label>
 			<input type="text" name="email">

 			<label>Pizza Title:</label>
 			<input type="text" name="title">

 			<label>Ingredients (comma separated):</label>
 			<input type="text" name="ingredients">
 			<div class="center">
 				<input type="submit" name="submit" class="btn brand z-depth-0">
 			</div>
 		</form>
 	</section>

 	<?php include('templates/footer.php') ?>

 </html>