<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$mobile = $_POST['mobile'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

		echo $sql = "SELECT * FROM poffice WHERE id = $id";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		if($password == $row['password']){
			$password = $row['password'];
		}
		else{
			$password = password_hash($password, PASSWORD_DEFAULT);
		}

		$sql = "UPDATE poffice SET name = '$firstname', email = '$email', password = '$password',mobile ='$mobile' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Details updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: pofficer.php');

?>