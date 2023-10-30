<?php
session_start();

include 'connect.php';
// Registration process
if (isset($_POST['submit'])) {
	$username = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$role = 'user';

	// Validate form data (perform additional validation as per your requirements)
	if (empty($username) || empty($email) || empty($password)) {
		$error = "All fields are required.";
	} else {
		// Check if the email already exists in the database
		$query = "SELECT * FROM user WHERE email = '$email'";
		$result = $conn->query($query);

		if ($result->num_rows > 0) {
			$error = "Email already exists.";
		} else {
			// Insert new user into the database
			$query = "INSERT INTO user (name, email, password, role) VALUES ('$username', '$email', '$password', '$role')";
			$conn->query($query);

			$success = "Registration successful. You can now login.";
			header("Location: index.php");
			exit;
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Crud operation</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<div class="row">
			<h1>User Registration</h1>
			<?php if (isset($error)) { ?>
				<p><?php echo $error; ?></p>
			<?php } ?>
			<?php if (isset($success)) { ?>
				<p><?php echo $success; ?></p>
			<?php } ?>

			<form action="" method="post">
				<div class="mb-3">
					<label for="name" class="form-label">Name</label>
					<input type="text" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Enter your name">
				</div>
				<div class="mb-3">
					<label for="email" class="form-label">Email address</label>
					<input type="email" name="email" class="form-control" id="email" placeholder="abc@gmail.com">
				</div>
				<div class="mb-3">
					<label for="phone" class="form-label">Phone</label>
					<input type="text" name="phone" class="form-control" id="phone" placeholder="+88 0123456789">
				</div>
				<div class="mb-3">
					<label for="password" class="form-label">Password</label>
					<input type="password" name="password" class="form-control" id="password">
				</div>
				<!--<div class="mb-3 form-check">
						<input type="checkbox" class="form-check-input" id="exampleCheck1">
						<label class="form-check-label" for="exampleCheck1">Check me out</label>
					</div>-->
				<button type="submit" class="btn btn-primary" name="submit">Submit</button>
			</form>
		</div>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>