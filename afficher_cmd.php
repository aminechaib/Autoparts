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


					<?php

    ?>





					<table class="order-details">
							<thead>
								<tr>
								    <th>id</th>
									<th>Piece</th>
									<th>reference</th>
									<th>quantity</th>
									
								</tr>
							</thead>
							<tbody class="order-details-body">
                           <?php
                                  if (isset($_GET['id'])) {
									$id = $_GET['id'];
									$pieces = Order_piece::find_by_id_order($id);
                               if($pieces){
                                   foreach($pieces as $piece){
                               ?>
                               <tr>
                                   <td><?php echo h($piece->id);?></td>
								   <td><?php echo h($piece->name);?></td>
                                   <td><?php echo h($piece->reference);?></td>
								   <td><?php echo h($piece->quantity);?></td>
                                </td>       
                               </tr>
                               <?php
                                   }
                               }
							    }
                           ?>
                        </tbody>
                    </table>						
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