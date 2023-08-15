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
						<p>Quality & Prix</p>
						<h1>Verifier les Commandes</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				
<?php
$id=$_SESSION['client']->id;
	?>
				<div class="col-lg-6">
				<div class="order-details-wrap">
				<table class="order-details">
							<thead>
								<tr>
								    <th>id</th>
								
									<th>Date de commande</th>
									<th>status de commande</th>
									<th>Afficher</th>
								</tr>
							</thead>
							<tbody class="order-details-body">
                           <?php
                               $pieces = Order::find_order_by_id_client($id); 
							
                               if($pieces){
                                   foreach($pieces as $piece){
                                    //  var_dump($piece);
                               ?>
                               <tr>
                                   <td><?php echo h($piece->id);?></td>
                                   <td><?php echo h($piece->creation_date);?></td>
                                   <td><?php echo h($piece->status);?></td>
								   <td><a id="openPopupButton" href="afficher_cmd.php?id=<?php echo $piece->id;?>" class="boxed-btn">Afficher</a></td>
                               	   <td><button type="button">Afficher</button></td>
                               <?php
                                   }
                               }
							    
                           ?>
                        </tbody>
                    </table>						<?php

?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php


		
?>
	<!-- end check out section -->
<!-- logo_carousel -->
<?php include('layouts/logo_carousel.php'); ?>	
	<!-- end logo_carousel -->

	<!-- footer -->
	<?php include('layouts/footer.php'); ?>					
	<!-- end footer -->