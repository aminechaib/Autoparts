<!-- head -->
<?php
include('layouts/head.php');
?>
<!-- end head -->

<!-- header -->
<?php include('layouts/header.php'); ?>
<!-- end header -->



<!-- home page slider -->
<div class="homepage-slider">
	<!-- single home slider -->
	<div class="single-homepage-slider homepage-bg-1">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Prix & Qualité</p>
							<h1>pièces de qualité supérieure</h1>
							<div class="hero-btns">
								<a href="shop.php" class="boxed-btn">Categorie Piece</a>
								<a href="contact.php" class="bordered-btn">Contactez-nous</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- single home slider -->
	<div class="single-homepage-slider homepage-bg-2">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Pièces automobiles de qualité</p>
							<h1>Collection 100% authentique</h1>
							<div class="hero-btns">
								<a href="shop.php" class="boxed-btn">Visitez notre Piece</a>
								<a href="contact.php" class="bordered-btn">Contactez-nous</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- single home slider -->

	<div class="single-homepage-slider homepage-bg-3">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-right">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Grande vente en cours !</p>
							<h1>Attendez les soldes ou les promotions</h1>
							<div class="hero-btns">
								<a href="shop.php" class="boxed-btn">Visitez notre Pieces</a>
								<a href="contact.php" class="bordered-btn">Contactez-nous</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end home page slider -->

<!-- features list section -->
<div class="list-section pt-80 pb-80">
	<div class="container">

		<div class="row">
			<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
				<div class="list-box d-flex align-items-center">
					<div class="list-icon">
						<i class="fas fa-shipping-fast"></i>
					</div>
					<div class="content">
						<h3>Livraison à domicile</h3>
						<p>Pour toute commande de plus de 10000DA</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
				<div class="list-box d-flex align-items-center">
					<div class="list-icon">
						<i class="fas fa-phone-volume"></i>
					</div>
					<div class="content">
						<h3>Assistance 24/7</h3>
						<p>Obtenez une assistance à toute heure de la journée</p>




					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="list-box d-flex justify-content-start align-items-center">
					<div class="list-icon">
						<i class="fas fa-sync"></i>
					</div>
					<div class="content">
						<h3>Remboursement</h3>
						<p>Obtenez un remboursement dans les 5 jours !</p>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- end features list section -->
<!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mb-5 mb-lg-0">
				<div class="form-title">
					<h3><span class="orange-text">Identifiez</span> votre véhicule</h3>
					<p>Identifiez votre véhicule en renseignant le modèle et le moteur pour afficher les pièces compatibles et faciliter la recherche.</p>
				</div>
				<?php
				$marks = Mark::find_all_voiture();
				$models = Model::find_all();
				$moteurs = Moteur::find_all();
				$compat = Compatible::find_all();
				$count = Mark::rows_tot();

				?>
				<div id="form_status"></div>
				<div class="contact-form">
					<form method="POST" type="POST">
						<p>
							<select name="mark" id="mark">
								<option value="">---Selectioner la Marque de ta voiture ---</option>
								<?php
								if ($marks) {
									foreach ($marks as $mark) {
										echo '<option value="' . $mark->id . '">' . $mark->name . '</option>';
									}
								}
								?>
							</select>
						</p>
						<p>
							<select name="model" id="model">
								<option value="">---Selectioner le Modele de ta voiture ---</</option>
								<?php

								?>
							</select>
						</p>

						<p>
							<select name="moteur" id="moteur">
								<option value="">---Selectioner le Moteur de ta voiture ---</</option>
								<?php

								?>
							</select>
						</p>

						<?php
						if (isset($_POST['am']) && isset($_POST['sub_moteur'])) {
							echo "great thing we have<br>" . $mark->name;
						}
						?>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

$pieces = Piece::find_all();

//var_dump($pieces);

?>

<!-- end contact form -->
<!-- product section -->
<div class="product-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3><span class="orange-text">Nos</span> pieces</h3>
					<p>Trouver les bonnes pièces auto pour votre voiture peut être difficile. Utilisez Auto Part pour faciliter votre vie.</p>
				</div>
			</div>
		</div>


		<!-- Include jQuery library -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<?php

		// Get the total number of products
		$total_products = count($pieces);

		// Set the number of products per page
		$per_page = 6;

		// Calculate the total number of pages
		$total_pages = ceil($total_products / $per_page);

		// Get the current page number
		$page = isset($_GET['page']) ? $_GET['page'] : 1;

		// Get the products for the current page
		$products = array_slice($pieces, ($page - 1) * $per_page, $per_page);

		// Initialize the scroll position
		$_SESSION['scroll_position'] = null;

		?>

		<div class="row" id="compatible">
			<?php foreach ($products as $piece) { ?>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.php?piece_id=<?php echo $piece->id; ?>"><img src="admin/piece_name/uploads/<?php echo $piece->photo; ?>" alt=""></a>
						</div>
						<h3><?php echo $piece->piece_name . "<br>" . $piece->reference . "<br>" . $piece->category_name; ?></h3>
						<p class="product-price"><span>Prix unitaire</span> <?php echo $piece->sale_price; ?> DA </p>
						<h3><?php
							$id_mark = $piece->id_mark;
							$mark = Mark::find_by_id($id_mark);
							echo $mark->name;
							?></h3>
						<form action="index.php?piece_id=<?php echo $piece->id; ?>" method="POST" class="add-to-cart-form">
							<?php
							if (isset($_SESSION['client'])) {
								if (!in_array($piece->id, (isset($_SESSION['cart']) ? $_SESSION['cart'] : []))) {

									if ($piece->quantity > 0)
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
			<?php } ?>
		</div>

		<?php if ($total_pages > 1) { ?>
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<?php if ($page > 1) { ?>
								<li><a href="?page=<?php echo $page - 1; ?>" onclick="storeScrollPosition()">Précédent</a></li>
							<?php } ?>

							<?php for ($i = 1; $i <= $total_pages; $i++) { ?>
								<?php if ($i == $page) { ?>
									<span class="page-number active"><?php echo $i; ?></span>
								<?php } else { ?>
									<li><a href="?page=<?php echo $i; ?>" onclick="storeScrollPosition()"><?php echo $i; ?></a></li>

								<?php } ?>
							<?php } ?>

							<?php if ($page < $total_pages) { ?>
								<li><a href="?page=<?php echo $page + 1; ?>" onclick="storeScrollPosition()">Suivant</a></li>
						</ul>
					</div>
				<?php } ?>
				</div>
			<?php } ?>

			<script>
				function storeScrollPosition() {
					window.sessionStorage.setItem('scrollPosition', window.scrollY);
				}
			</script>






		</div>
	</div>

</div>
</div>
</div>
<!-- end product section -->

<!-- logo_carousel -->
<?php include('layouts/logo_carousel.php'); ?>
<!-- end logo_carousel -->
<!-- find our location -->
<div class="find-location blue-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<p> <i class="fas fa-map-marker-alt"></i> Trouvez notre emplacement</p>
			</div>
		</div>
	</div>
</div>
<!-- end find our location -->
<!-- google map section -->
<div class="embed-responsive embed-responsive-21by9">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3198.776745996894!2d2.904647674313292!3d36.7039023731245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128fa553cd88f7f3%3A0xe9898bd7bdef7ba4!2sPieces%20Auto!5e0!3m2!1sfr!2sdz!4v1690289316712!5m2!1sfr!2sdz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- end google map section -->
<!-- footer -->
<?php include('layouts/footer.php'); ?>
<!-- end footer -->