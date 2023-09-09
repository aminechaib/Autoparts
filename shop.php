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
					<p>Prix & Qualité</p>
					<h1>Piece</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- products -->
<div class="product-section mt-150 mb-150">
	<div class="container">

		<div class="row">
			<div class="col-md-35">

				<div class="product-filters">
					<ul>
						<li class="active" data-filter="*">Toute</li>
						<?php
						$categorys = Category::find_all();
						$pieces = Piece::find_all();
						// echo "hhhhhhhherrrrrrrrre";var_dump($categorys);
						if ($categorys) {
							foreach ($categorys as $key => $category) {
						?>
								<li data-filter=".<?php echo $category->name; ?>"><?php echo $category->name; ?></li>
						<?php
							}
						}
						?>
					</ul>
				</div>
			</div>
		</div>
		<?php
		$pieces = Piece::find_all(); ?>
		<div class="row product-lists">

			<?php

			if ($pieces) {
				foreach ($pieces as $vlue) {	?>

					<div class="col-lg-4 col-md-6 text-center <?php echo h($vlue->category_name); ?>">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.php?piece_id=<?php echo $vlue->id; ?>"><img src="admin/piece_name/uploads/<?php echo $vlue->photo; ?>" alt=""></a>
							</div>
							<h3><?php echo h($vlue->piece_name); ?><br><?php echo h($vlue->reference); ?></h3>

							<p class="product-price"><span>Prix unitaire</span> <?php echo h($vlue->sale_price); ?> DA </p>

							<form action="shop.php?piece_id=<?php echo $vlue->id; ?>" method="POST" class="add-to-cart-form">
								<?php
								if (isset($_SESSION['client'])) {
									if (!in_array($vlue->id, (isset($_SESSION['cart']) ? $_SESSION['cart'] : []))) {

										if ($vlue->quantity > 0)
											echo '<input type="submit" name="add_to_cart" value="Ajouter au panier">';
										else
											echo '<input type="submit" name="" value="En rupture stock">';
									} else {
										echo '<input type="submit" name="" value="Déjà ajouté">';
									}
								} else { ?>
								<?php
								}
								?>
							</form>
						</div>
					</div>

			<?php
				}
			}
			?>

		</div>





	</div>
</div>
<!-- end products -->
<!-- logo_carousel -->
<?php include('layouts/logo_carousel.php'); ?>
<!-- end logo_carousel -->

<!-- footer -->
<?php include('layouts/footer.php'); ?>
<!-- end footer -->