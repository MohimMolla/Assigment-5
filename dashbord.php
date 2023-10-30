<?php
include 'connect.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    // Use parameter binding to prevent SQL injection
    $sql = "DELETE FROM `user` WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        header('location: index.php');
        exit(); // Ensure the script exits after the redirect
    } else {
        // Error handling, e.g., display an error message
        die($stmt->error);
    }
}

$deleteSuccess = isset($_GET['delete_success']) ? true : false;
$username = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>Hello</h1>
            <a href="./user.php">Create User</a>
            <?php
            if ($deleteSuccess) {
                echo '<div class="alert alert-success">Record deleted successfully.</div>';
            }
            ?>
		    <h1>User Name: <?php echo $username; ?></h1>
            <table class="table table-success table-striped">
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <!-- Remove the empty <td> tag for the "Role" column -->
                    <th>Action</th>
                </tr>
                <?php
                $sql = "SELECT * FROM user";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $sl = 1; // Variable to keep track of the row number

                    // Loop through each row in the result set
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$sl}</td>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['phone']}</td>";
                        echo "<td>
                            <a class='btn btn-primary' href='edit.php?editid={$row['id']}'>Edit</a>
                            <a class='btn btn-danger' href='index.php?deleteid={$row['id']}'>Delete</a>
                            </td>";
                        echo "</tr>";

                        $sl++; // Increment the row number
                    }
                }
                ?>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
