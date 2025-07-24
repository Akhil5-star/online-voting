<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$mobile = $_POST['mobile'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		//$filename = $_FILES['photo']['name'];
		//if(!empty($filename)){
			//move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		//}
		//generate voters id
		//$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		//$voter = substr(str_shuffle($set), 0, 15);

		$sql = "INSERT INTO poffice (name,email,password,mobile) VALUES ('$firstname', '$email', '$password', '$mobile')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Presiding Officer added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: pofficer.php');
?>