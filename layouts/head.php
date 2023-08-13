<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favico.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">
	<link rel="stylesheet" href="toast/toast.css">

</head>
<body>
	
	<!-- PreLoader-->
    <!-- <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div> -->
    <!--PreLoader Ends -->

	<?php require_once('./admin/includes/initialize.php'); ?>

	<?php
	// add to cart
	// => function isset(add_to_cart)
	if(isset($_POST['add_to_cart'])){
		// check if session(cart) exist
		if(!isset($_SESSION['cart']))
			$_SESSION['cart'] = array();
		
		// get the piece id
		$id = $_GET['piece_id'];
if(!in_array($id,$_SESSION['cart'])){
		// push the id to session(cart) array
		array_push($_SESSION['cart'], $id);
		//echo 'here';exit;
		$_SESSION['addedToCart'] = true;
	}}
	//$cart_count = 0;
	if(isset($_SESSION['cart']))
		// var_dump(array_values($_SESSION['cart']));
//unset($_SESSION['cart']);
	$cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : '0';
	?>