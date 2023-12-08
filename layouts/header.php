<!-- menu start -->
<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
                        
						<div class="site-logo">
							<a href="index.php">
								<img src="assets/img/logo.png" alt="">
							</a>   
                            <p>
                            <?php
    $currentPage = $_SERVER['PHP_SELF'];
    if (basename($currentPage) === 'index.php') {
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
                            <?php
// Get the current filename
$currentFilename = basename($_SERVER['PHP_SELF']);

?>
<li <?php if ($currentFilename === 'index.php') echo 'class="current-list-item"'; ?>><a href="index.php">Accueil</a></li>
                             <?php if(isset($_SESSION['client'])){
                                
                            ?>
                            <li <?php if ($currentFilename === 'checkout.php') echo 'class="current-list-item"'; ?>><a href="checkout.php">Commande</a></li>
                            <?php  }else{ }?>
                            <li <?php if ($currentFilename === 'about.php') echo 'class="current-list-item"'; ?>><a href="about.php">À propos</a></li>
                            </li>
                            <li <?php if ($currentFilename === 'contact.php') echo 'class="current-list-item"'; ?>><a href="contact.php">Contact</a></li>
                            <li <?php if ($currentFilename === 'shop.php') echo 'class="current-list-item"'; ?>><a href="shop.php">Pieces</a></li>
                            <li>
                                <div class="header-icons">
                                    <?php 
                                    if(isset($_SESSION['cart']))
                                    {?>
                                        <a class="shopping-cart" href="cart.php">
                                        <i class="fas fa-shopping-cart"></i>
                                        <script>// Get the current page URL
var currentPageURL = window.location.href;

// Check if the current page URL contains "cart.php"
if (currentPageURL.includes("cart.php")) {
  // Get the element by its class name
  var cartIcon = document.querySelector(".fas.fa-shopping-cart");

  // Change the color of the element
  cartIcon.style.color = "#f28123"; // You can replace "red" with any desired color
}
</script>
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