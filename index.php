
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
								<h1>Attendez les soldes ou les promotions</h1>
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
							<p>Pour toute commande de plus de 10000DZD</p>
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
							<p><input type="text" id="productFilter" placeholder="Filter by name"></p>
							<?php 
								if(isset($_POST['am']) && isset($_POST['sub_moteur'])){
									echo "great thing we have<br>".$mark->name;
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
						<h3><span class="orange-text">Nos</span> produits</h3>
						<p>Trouver les bonnes pièces auto pour votre voiture peut être difficile. Utilisez Auto Part pour faciliter votre vie.</p>
					</div>
				</div>
			</div>
		

			<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="row" id="compatible">
  <?php 
    if($pieces) {
      foreach ($pieces as $key => $piece) {
		
  ?>
  <div class="col-lg-4 col-md-6 text-center">
    <div class="single-product-item">
      <div class="product-image">
        <a href="single-product.php?piece_id=<?php echo $piece->id;?>"><img src="admin/uploads/<?php echo $piece->photo; ?>" alt=""></a>
      </div>
      <h3><?php echo $piece->piece_name." ".$piece->reference." ".$piece->category_name; ?></h3>
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

<script>
  const filterInput = document.getElementById('productFilter');
  const productContainer = document.getElementById('compatible');

  filterInput.addEventListener('input', function() {
    const searchTerm = filterInput.value.trim().toLowerCase();

    Array.from(productContainer.getElementsByClassName('single-product-item')).forEach(item => {
      const productName = item.querySelector('h3').textContent.toLowerCase();
      const productReference = item.querySelector('h3').textContent.toLowerCase();
	  const productcategory = item.querySelector('h3').textContent.toLowerCase();
      
      if (productName.includes(searchTerm) || productReference.includes(searchTerm) || productReference.includes(searchTerm)) {
        item.style.display = 'block';
      } else {
        item.style.display = 'none';
      }
    });
  });
</script>


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

<?php
    $targetTime = time() + 3600;
?>




                    <div class="time-counter"><div class="time-countdown clearfix" ><div class="counter-column"><div class="inner"><span class="count" id="ss"></span>Days</div></div> <div class="counter-column"><div class="inner"><span class="count" id="ee"></span>Hours</div></div>  <div class="counter-column"><div class="inner"><span class="count" id="ii"></span>Mins</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Secs</div></div></div></div>
                
					<script>
        // Set the target time from PHP
        var targetTime = <?php echo json_encode($targetTime * 1000); ?>;

                // Update the countdown every second
                var countdown = setInterval(function() {
            var now = new Date().getTime();
            var distance = targetTime - now;
            // Calculate remaining time
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.getElementById('ss').innerText = seconds;
            document.getElementById('ee').innerText = minutes;
            document.getElementById('ii').innerText = days;
            // Display the countdown
            document.getElementById("countdown").innerHTML = "Countdown: " + days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

            // If the countdown is finished, display a message
            if (distance < 0) {
                clearInterval(countdown);
                document.getElementById("countdown").innerHTML = "Countdown expired.";
            }
        }, 1000);
    </script>
					
					
					<a href="cart.php" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end cart banner section -->

	<!-- testimonail-section -->

	<!-- end testimonail-section -->
	
	<!-- advertisement section -->
	<!-- <div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt-bg">
					<video width="640" height="360" controls>
        <source src="ad.mp4" type="video/mp4">	
				</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">Depuis l'année 2019</p>
						<h3>Nous sommes<span class="orange-text">AutoParts</span></h3>
						<p>Bienvenue chez AutoPart ! Depuis 2019, nous sommes votre destination privilégiée pour des pièces automobiles de qualité supérieure. Notre engagement envers l'industrie automobile et notre gamme exhaustive de produits font de nous le partenaire idéal pour entretenir et réparer votre véhicule</p>
						</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- end advertisement section -->
	
	<!-- shop banner -->
	<!-- <section class="shop-banner">
    	<div class="container">
        	<h3>December sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
            <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
            <a href="shop.php" class="cart-btn btn-lg">Shop Now</a>
        </div>
    </section> -->
	<!-- end shop banner -->

	<!-- latest news -->
	<!-- <div class="latest-news pt-150 pb-150">
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
	</div> -->
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
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3198.776745996894!2d2.904647674313292!3d36.7039023731245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128fa553cd88f7f3%3A0xe9898bd7bdef7ba4!2sPieces%20Auto!5e0!3m2!1sfr!2sdz!4v1690289316712!5m2!1sfr!2sdz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>	
</div>
	<!-- end google map section -->
	<!-- footer -->
	<?php include('layouts/footer.php'); ?>					
	<!-- end footer -->