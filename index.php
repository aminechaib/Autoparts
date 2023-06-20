
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
								<p class="subtitle">Quality & Prix</p>
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
									<a href="shop.php" class="boxed-btn">Visitez notre Produit</a>
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
								<h1>Obtenez une remise de décembre</h1>
								<div class="hero-btns">
									<a href="shop.php" class="boxed-btn">Visitez notre Produit</a>
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
							<p>Pour toute commande de plus de 5000da</p>
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
						<p>Obtenez un remboursement dans les 3 jours !</p>
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
					$compat=Compatible::find_all();
					$count = Mark::rows_tot();
					
					?>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form method="POST" type="POST"> 
							<p>
								<select name="mark" id="mark">
									<option value="">---SELECT Mark FIRST---</option>           
									<?php
									if($marks)
									{						
										foreach($marks as $mark){
											echo '<option value="'.$mark->id.'">'.$mark->name.'</option>';
										}
									}   			
									?>
								</select>
							</p>
							<p>
								<select name="model" id="model">
									<option value="">---SELECT Model FIRST---</option>           
									<?php
									
									?>
								</select>
							</p>

							<p>
								<select name="moteur" id="moteur">
									<option value="">---SELECT Moteur FIRST---</option>           
									<?php
									
									?>
								</select>
							</p>
							<p>
								<select name="compatible" id="compatible">
									<option value="">---SELECT Moteur FIRST---</option>           
									<?php
									
									?>
								</select>
							</p>

							<input type="hidden" name="token" value="FsWga4&@f6aw" />
							<p><input type="submit" value="search" name="sub_moteur" ></p>
						
							<?php 
								if(isset($_POST['am']) && isset($_POST['sub_moteur'])){
									echo "great thing we have<br>".$mark->name;
								}
								// foreach($marks as $mark){	
								// 	$find= Mark :: find_model_where_mark($mark->id);
								// 					var_dump($find) ;}
							?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
if(isset($_POST['search']))
{
	// eb3at rekosssssssssssssss ta3 pieces 
	// rah yjiblek Object

}else{
	$pieces = Piece::find_all();
}
?>

	<!-- end contact form -->
	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">	
						<h3><span class="orange-text">Nos</span> produits</h3>
						<p>Trouver les bonnes pièces auto pour votre voiture peut être difficile. Utilisez Auto Part pour faciliter votre vie.</p>
					</div>
				</div>
			</div>

			<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="row">
  <?php 
    if($pieces) {
      foreach ($pieces as $key => $piece) {
  ?>
  <div class="col-lg-4 col-md-6 text-center">
    <div class="single-product-item">
      <div class="product-image">
        <a href="single-product.php?piece_id=<?php echo $piece->id;?>"><img src="admin/uploads/<?php echo $piece->photo; ?>" alt=""></a>
      </div>
      <h3><?php echo $piece->name." ".$piece->reference; ?></h3>
      <p class="product-price"><span>Prix unitaire</span> <?php echo $piece->sale_price; ?> DZD </p>
      <form action="index.php?piece_id=<?php echo $piece->id;?>" method="POST" class="add-to-cart-form">
        <?php 
if(isset($_SESSION['client'])){
	if(!in_array($piece->id, (isset($_SESSION['cart']) ? $_SESSION['cart'] : []))) {
		echo '<input type="submit" name="add_to_cart" value="Ajouter au panier">';
	  } else {
		echo '<input type="submit" name="" value="Déjà ajouté">';
	  }
}else{?>
<p>connect</p><?php
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

<script>
  $(document).ready(function() {
    // Store the current scroll position when the form is submitted
    $('.add-to-cart-form').on('submit', function() {
      var scrollPosition = $(window).scrollTop();
      sessionStorage.setItem('scrollPosition', scrollPosition);
    });

    // Restore the scroll position on page load
    var storedScrollPosition = sessionStorage.getItem('scrollPosition');
    if (storedScrollPosition) {
      $(window).scrollTop(storedScrollPosition);
      sessionStorage.removeItem('scrollPosition');
    }
  });
</script>

			
			</div>
		</div>
	</div>
	<!-- end product section -->

	<!-- cart banner section -->
	<section class="cart-banner pt-100 pb-100">
    	<div class="container">
        	<div class="row clearfix">
            	
                <!--Content Column-->
                <div class="content-column col-lg-6">
					<h3><span class="orange-text">Offre</span> du mois</h3>
                    <h4>Hikan Strwaberry</h4>
                    <div class="text">Quisquam minus maiores repudiandae nobis, minima saepe id, fugit ullam similique! Beatae, minima quisquam molestias facere ea. Perspiciatis unde omnis iste natus error sit voluptatem accusant</div>
                    <!--Countdown Timer-->
                    <div class="time-counter"><div class="time-countdown clearfix" data-countdown="2020/2/01"><div class="counter-column"><div class="inner"><span class="count">00</span>Days</div></div> <div class="counter-column"><div class="inner"><span class="count">00</span>Hours</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Mins</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Secs</div></div></div></div>
                	<a href="cart.php" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end cart banner section -->

	<!-- testimonail-section -->
	<div class="testimonail-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar1.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Saira Hakim <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar2.png" alt="">
							</div>
							<div class="client-meta">
								<h3>David Niph <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar3.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Jacob Sikim <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section -->
	
	<!-- advertisement section -->
	<div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt-bg">
						<a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">Since Year 1999</p>
						<h2>We are <span class="orange-text">Fruitkha</span></h2>
						<p>Etiam vulputate ut augue vel sodales. In sollicitudin neque et massa porttitor vestibulum ac vel nisi. Vestibulum placerat eget dolor sit amet posuere. In ut dolor aliquet, aliquet sapien sed, interdum velit. Nam eu molestie lorem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente facilis illo repellat veritatis minus, et labore minima mollitia qui ducimus.</p>
						<a href="about.php" class="boxed-btn mt-4">know more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->
	
	<!-- shop banner -->
	<section class="shop-banner">
    	<div class="container">
        	<h3>December sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
            <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
            <a href="shop.php" class="cart-btn btn-lg">Shop Now</a>
        </div>
    </section>
	<!-- end shop banner -->

	<!-- latest news -->
	<div class="latest-news pt-150 pb-150">
		<div class="container">

			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> News</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="single-news.php"><div class="latest-news-bg news-bg-1"></div></a>
						<div class="news-text-box">
							<h3><a href="single-news.php">You will vainly look for fruit on it in autumn.</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
							<a href="single-news.php" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="single-news.php"><div class="latest-news-bg news-bg-2"></div></a>
						<div class="news-text-box">
							<h3><a href="single-news.php">A man's worth has its season, like tomato.</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
							<a href="single-news.php" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
					<div class="single-latest-news">
						<a href="single-news.php"><div class="latest-news-bg news-bg-3"></div></a>
						<div class="news-text-box">
							<h3><a href="single-news.php">Good thoughts bear good fresh juicy fruit.</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
							<a href="single-news.php" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<a href="news.php" class="boxed-btn">More News</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->
	<!-- logo_carousel -->
	<?php include('layouts/logo_carousel.php'); ?>	
	<!-- end logo_carousel -->
	<!-- find our location -->
	<div class="find-location blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end find our location -->
	<!-- google map section -->
	<div class="embed-responsive embed-responsive-21by9">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d199.92373432877062!2d2.9070994869812368!3d36.70383021341734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128fa57974691587%3A0xa362b34dc5942230!2z2YXYrdmEINmF2YjYs9mJ!5e0!3m2!1sen!2sdz!4v1683746438554!5m2!1sen!2sdz" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" class="embed-responsive-item"></iframe>
	</div>
	<!-- end google map section -->
	<!-- footer -->
	<?php include('layouts/footer.php'); ?>					
	<!-- end footer -->