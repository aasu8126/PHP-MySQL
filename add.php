<?php 

	$email = $title = $ingredients = '';
	$errors = array('email' => '', 'title' => '', 'ingredients' => '');
	
	if(isset($_POST['submit'])){
		/* echo htmlspecialchars($_POST['email']);
		echo htmlspecialchars($_POST['title']);
		echo htmlspecialchars($_POST['ingredients']); */

		// check email
		if (empty($_POST['email'])) {
			// echo "Email is required <br />";
			$errors['email'] = 'Email is required' ;
		}else{
			// echo htmlspecialchars($_POST['email']);
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				// echo 'email must be a valid email address <br />' ;
				$errors['email'] = 'Email must be a valid email address' ;
			}
		}

		// check title
		if(empty($_POST['title'])){
			// echo "Title is required <br />";
			$errors['title'] = 'Title is required' ;
		}else{
			// echo htmlspecialchars($_POST['title']);
			$title = $_POST['title'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
				// echo "Title must be letters and spaces only <br />";
				$errors['title'] = 'Title must be letters and spaces only' ;
			}
		}

		// check ingredients
		if (empty($_POST['ingredients'])) {
			// echo "At least one ingredient is required";
			$errors['ingredients'] = 'At least one ingredient is required' ;
		}else{
			// echo htmlspecialchars($_POST['ingredients']);
			$ingredients = $_POST['ingredients'];
			if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
				// echo "Ingredients must be comma separated.";
				$errors['ingredients'] = 'Ingredients must be comma separated' ;
			}
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
 			<input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
 			<div class="red-text">
 				<?php echo $errors['email']; ?>
 			</div>

 			<label>Pizza Title:</label>
 			<input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>">
 			<div class="red-text">
 				<?php echo $errors['title']; ?>
 			</div>

 			<label>Ingredients (comma separated):</label>
 			<input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients); ?>">
 			<div class="red-text">
 				<?php echo $errors['ingredients']; ?>
 			</div>

 			<div class="center">
 				<input type="submit" name="submit" class="btn brand z-depth-0">
 			</div>
 		</form>
 	</section>

 	<?php include('templates/footer.php') ?>

 </html>