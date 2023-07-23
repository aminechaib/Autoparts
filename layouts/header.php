<!-- menu start -->
<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.php">
								<img src="assets/img/logo AP.png" alt="">
							</a>
						</div>
						<!-- logo -->
                        <title>Auto Parts</title>
						<!-- menu start -->
						<nav class="main-menu">
                            <ul>
                            <li class="current-list-item"><a href="index.php">Accueil</a></li>
                            <li><a href="about.php">À propos</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="404.php">Page 404</a></li>
                                    <li><a href="about.php">À propos</a></li>
                                    <li><a href="cart.php">Panier</a></li>
                                    <li><a href="checkout.php">Check-out</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="news.php">Actualités</a></li>
                                    <li><a href="shop.php">Produit</a></li>
                                </ul>
                            </li>
                            <li><a href="news.php">Actualités</a>
                                <ul class="sub-menu">
                                    <li><a href="news.php">Actualités</a></li>
                                    <li><a href="single-news.php">Actualité unique</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="shop.php">Produit</a>
                                <ul class="sub-menu">
                                    <li><a href="shop.php">Produit</a></li>
                                    <li><a href="checkout.php">Check-out</a></li>
                                    <li><a href="single-product.php">Produit unique</a></li>
                                    <li><a href="cart.php">Panier</a></li>
                                </ul>
                            </li>
                            <li>
                                <div class="header-icons">
                                    <a class="shopping-cart" href="cart.php">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span style="background-color:brown;padding:0px 2px;"><?php if(isset($cart_count)){ echo $cart_count;}else{echo"0";} ?></span>
                                    </a>
                                    
                                    <?php
                                        if(isset($_SESSION['client']))
                                        {
                                            echo '<a href="#">'. $_SESSION['client']->first_name.' '.$_SESSION['client']->last_name .'</a>';
                                            echo '<a href="./auth/logout.php">logout</a>';
                                        }else{
                                            echo '<a href="login.php">Connexion</a>';
                                            echo '<a href="register.php">Inscription</a>';
                                        }
                                    ?>
                                    
                                </div>
                            </li>
                            </ul>
                        </nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>