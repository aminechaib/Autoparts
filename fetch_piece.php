<?php
require_once('./admin/includes/initialize.php');
if(!empty($_POST["id"])){
    $objectModels = Compatible::find_piece_by_moteur_id($_POST["id"]);
   
    if($objectModels)
    {
     	
    	foreach($objectModels as $piece){
            

 
       ?> 
 
        <a href="single-product.php?piece_id=<?php echo $piece->id;?>"><img src="admin/uploads/<?php echo $piece->photo; ?>" alt=""></a>
      <h3><?php echo $piece->name." ".$piece->reference; ?></h3>
      <p class="product-price"><span>Prix unitaire</span> <?php echo $piece->sale_price; ?> DZD </p>
      <form action="index.php?piece_id=<?php echo $piece->id;?>" method="POST" class="add-to-cart-form">
   <?php
    	}
    }
}
?>
