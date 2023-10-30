<?php
include 'connect.php';

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$phone = $_POST['phone'];
	//$role = $_POST['role'];
	$sql = "insert into `user`(name,email,password,phone) values('$name','$email','$password','$phone')";

	$result = mysqli_query($conn, $sql);
	if ($result) {
		header('location:index.php');
		echo "Insert data successfully";
	}
	else{
		die(mysqli_errno($conn));
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
			<h1>Create User Here</h1>
			<div class="col-md-10">
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
					
					<button type="submit" class="btn btn-primary" name="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>