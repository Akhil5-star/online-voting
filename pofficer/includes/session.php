<?php
	session_start();
	include 'includes/conn.php';

	if(!isset($_SESSION['pofficer']) || trim($_SESSION['pofficer']) == ''){
		header('location: index.php');
	}

	$sql = "SELECT * FROM poffice WHERE id = '".$_SESSION['pofficer']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>