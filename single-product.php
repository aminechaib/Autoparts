	<!-- head -->
	<?php include('layouts/head.php'); ?>
	<!-- end head -->

	<!-- header -->
	<?php include('layouts/header.php'); ?>
	<!-- end header -->






	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Voir plus de détails</p>
						<h1>Information Piece</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->


	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<?php
						// 
						if (isset($_GET['piece_id'])) {
							$pieceId = $_GET['piece_id'];

							$pieces = Piece::find_by_id_mod_ref($pieceId);

							if (is_array($pieces) || is_object($pieces)) {
								foreach ($pieces as $piece) {
									// Your loop logic here
							
									// Move the assignment inside the loop
									$photo = $piece->photo; // Display id_name for each piece
								}
							} else {
								// Handle the case where $pieces is not an array or object
								// For example, you could log an error or display a message
							}
							
							// Now $photo should have the value from the last iteration of the loop
							

						?>
							<img src="admin/piece_name/uploads/<?php echo $photo; ?>" alt=""><?php ?>
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<?php
						if(isset($piece->piece_name)){
						?>
						
						<h3><?php echo "<span class=orange-text>Nom: </span>" . $piece->piece_name . "<br>" . "<span class=orange-text>Reference : </span>" . $piece->piece_reference;  ?></h3>
						<p class="single-product-pricing "> <?php echo "Prix: " . $piece->sale_price; ?>DA</p>

						<span>Compatible:</span>
						<?php
							foreach ($pieces as $piece) {

								// 
								// Display id_name for each piece
						?>
							<p><?php echo $piece->mark_name . ', ' . $piece->model_name . ', ' . $piece->moteur_name . ', ' . $piece->puissance . 'ch'; ?></p>
						<?php
							}
						}
						else{
							echo "nothing to show";
						}
						?>



						<!-- <div class="single-product-form">
							<form action="index.php">
								<input type="number" placeholder="0">
							</form>
							<a href="cart.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
							<p><strong>Categories: </strong>Fruits, Organic</p>
						</div>
						<h4>Share:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->
	<?php

						} else {
							echo "Piece ID not specified in the URL.";
						}
	?>
	<!-- more products -->
	<!-- <div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.php"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3>Strawberry</h3>
						<p class="product-price"><span>Per Kg</span> 85$ </p>
						<a href="cart.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.php"><img src="assets/img/products/product-img-2.jpg" alt=""></a>
						</div>
						<h3>Berry</h3>
						<p class="product-price"><span>Per Kg</span> 70$ </p>
						<a href="cart.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.php"><img src="assets/img/products/product-img-3.jpg" alt=""></a>
						</div>
						<h3>Lemon</h3>
						<p class="product-price"><span>Per Kg</span> 35$ </p>
						<a href="cart.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- end more products -->
	<!-- logo_carousel -->
	<?php include('layouts/logo_carousel.php'); ?>
	<!-- end logo_carousel -->
	<!-- footer -->
	<?php include('layouts/footer.php'); ?>
	<!-- end footer -->