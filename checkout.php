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
									<th>Suprimer</th>
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
								   <td>
<?php
$item=$piece->id;
?>
<button type="button" class="btn btn-custom open-modal" data-toggle="modal" data-target="#myModal" data-value="<?php echo $item; ?>">Afficher</button>
<style>.btn-custom {
    background-color: #F28123;
    color: white; /* You can adjust the text color as needed for contrast */
    /* Add any other styles you need for your custom button */
}

</style>
		<?php
    
    ?>
					
				</td>
				<td>
				<button type="button" class="btn btn-custom dele-modal" data-toggle="modal" data-value="<?php echo $item; ?>">Suprimer</button>
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Find the button by its class name
  var button = document.querySelector('.btn-custom.dele-modal');

  // Attach a click event listener to the button
  button.addEventListener('click', function() {
    // Perform the action you want, e.g., show the modal

    // Reload the page
    location.reload();
  });
});
</script>
	</td>

  								<?php
                                   }
                               }						
                           ?>
                        </tbody>
                    </table>	
					 <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Votre Commande</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="selectedValueDisplay">
                    <!-- Selected value will be displayed here -->
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>		
	
	
					</div>
				</div>
			</div>
		</div>
	</div>
	




	<!-- end check out section -->
<!-- logo_carousel -->
<?php include('layouts/logo_carousel.php'); ?>	
	<!-- end logo_carousel -->

	<!-- footer -->
	<?php include('layouts/footer.php'); ?>					
	<!-- end footer -->