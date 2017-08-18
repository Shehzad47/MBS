<?php
session_start();
if (!isset($_SESSION['start'])) {
	header("location:welcome");
}
?>

<!DOCTYPE html>
<html>
<title>Message BroadCasting Service</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/w3-custom.css">
<link rel="stylesheet" href="css/custom.css">
<link rel="stylesheet" href="css/w3-theme-indigo.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<script src="js/jquery-3.1.1.js"></script>
<script src="js/script.js"></script>
<style>
	html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5" >

	<!-- Navbar -->
	<?php include 'inc/navbar.php'; ?>

	<!-- Page Container Start -->
	<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">