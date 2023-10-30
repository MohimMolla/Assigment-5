<?php
session_start();

include 'connect.php';



// Login process
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form data (perform additional validation as per your requirements)
    if (empty($email) || empty($password)) {
        $error = "Email and password are required.";
    } else {
        // Check if the user exists in the database
        $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            $_SESSION['user'] = $user;

            // Redirect based on user role
            if ($user['role'] == 'admin') {
                header("Location: dashbord.php");
                exit();
            } else {
                header("Location: user.php");
                exit();
            }
        } else {
            $error = "Invalid email or password.";
        }
    }
}

// Logout process
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
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
	<div class="contaimer">
	
<a href="register.php">Register</a>

    <h1>User Login</h1>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <!--<form method="post" action="">
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" name="login" value="Login">
    </form>-->
	</div>
    

    
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>