<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'back');

	$name = "";
	$address = "";
	$surname = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];
		$surname = $_POST['surname'];

		mysqli_query($db, "INSERT INTO info (name, address, surname) VALUES ('$name', '$address', '$surname')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: index.php');
	}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$surname = $_POST['surname'];

	mysqli_query($db, "UPDATE info SET name='$name', address='$address', surname='$surname' WHERE id=$id");
	$_SESSION['message'] = "Address updated!"; 
	header('location: index.php');
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: index.php');
}