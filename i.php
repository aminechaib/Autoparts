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