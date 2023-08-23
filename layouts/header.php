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
                            <p>
                            <?php
                                if("http://localhost/Autoparts/index.php" == $url)
                                {
                                ?>
                                <input type="text" id="productFilter" placeholder="Recherche">
                                <?php
                                }
                                ?>
                            </p>
						</div>
						<!-- logo -->
                        <title>Auto Parts</title>
						<!-- menu start -->
                        
                    
						<nav class="main-menu">
                            <ul>
                            <li class="current-list-item"><a href="index.php">Accueil</a></li>
                            <li><a href="checkout.php">Check-out</a></li>
                            <li><a href="about.php">À propos</a></li>
                            </li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="shop.php">Produit</a></li>
                            <li>
                                <div class="header-icons">
                                    <?php 
                                    if(isset($_SESSION['cart']))
                                    {?>
                                        <a class="shopping-cart" href="cart.php">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span style="background-color:brown;padding:0px 2px;">
                                        <?php 
                                        echo count($_SESSION['cart']);                                        
                                        ?>
                                        </span>
                                    </a>
                                    
                                    <?php
                                    }else{?>
                                        <a class="shopping-cart" href="index.php">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span style="background-color:brown;padding:0px 2px;">
                                        0</span>
                                    </a>
                                    <?php
                                    }
                                    ?>                                    
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
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>