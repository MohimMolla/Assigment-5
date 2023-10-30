<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
	$id = $_GET['deleteid'];

	$sql = "DELETE FROM `user` WHERE `id=$id";
	$result = mysqli_query($conn, $sql);
	if($result){
		header('location:dashbord.php');
	}
	else{
		die(mysqli_errno($conn));
	}
}


?>