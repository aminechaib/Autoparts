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
						<p>Fresh and Organic</p>
						<h1>Check Out Product</h1>
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
				<!-- <div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Billing Address
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<form action="index.php">
						        		<p><input type="text" placeholder="Name"></p>
						        		<p><input type="email" placeholder="Email"></p>
						        		<p><input type="text" placeholder="Address"></p>
						        		<p><input type="tel" placeholder="Phone"></p>
						        		<p><textarea name="bill" id="bill" cols="30" rows="10" placeholder="Say Something"></textarea></p>
						        	</form>
						        </div>
						      </div>
						    </div>
						  </div>
						  <div class="card single-accordion">
						    <div class="card-header" id="headingTwo">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						          Shipping Address
						        </button>
						      </h5>
						    </div>
						    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="shipping-address-form">
						        	<p>Your shipping address form is here.</p>
						        </div>
						      </div>
						    </div>
						  </div>
						  <div class="card single-accordion">
						    <div class="card-header" id="headingThree">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						          Card Details
						        </button>
						      </h5>
						    </div>
						    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="card-details">
						        	<p>Your card details goes here.</p>
						        </div>
						      </div>
						    </div>
						  </div>
						</div>

					</div>
				</div> -->
<?php
if (isset($_SESSION['form_inputs']) && is_array($_SESSION['form_inputs']) && isset($_SESSION['client'])) {
    
	var_dump($_SESSION['client']);
	?>
				<div class="col-lg-6">
					<div class="order-details-wrap">
						<table class="order-details">
							<thead>
								<tr>
								    <th>reference</th>
									<th>pieces</th>
									<th>Prix</th>
									<th>quantity</th>
									<th>total</th>
								</tr>
							</thead>
							<tbody class="order-details-body">
							

<tr>
<?php foreach ($_SESSION['form_inputs'] as $input) { ?>
                <tr>
                    <td><?php echo $input['name']; ?></td>
                    <td><?php echo $input['price']; ?></td>
                    <td><?php echo $input['quantity']; ?></td>
                    <td><?php echo $input['quantity'] * $input['price']; ?></td>
                </tr>
            <?php } ?>

			<form action="" method="POST">
				<input type="submit" name="clear">
			</form>
<?php
if (isset($_POST['clear'])) {
    unset($_SESSION['form_inputs']);
}
?>   





	<!-- <tr>
									<td>Strawberry</td>
								<td>$85.00</td>
								</tr>
								<tr>
									<td>Berry</td>
									<td>$70.00</td>
								</tr>
								<tr>
									<td>Lemon</td>
									<td>$35.00</td>
								</tr>
							</tbody>
							<tbody class="checkout-details">
								<tr>
									<td>Subtotal</td>
									<td>$190</td>
								</tr>
								<tr>
									<td>Shipping</td>
									<td>$50</td>
								</tr>
								<tr>
									<td>Total</td>
									<td>$240</td>
								</tr> -->
							</tbody>
						</table>
						<?php
} else {
    echo "No inputs found in the session.";
}
?>
						<a href="#" class="boxed-btn">Place Order</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php
if(isset($_POST['sm']) && isset($_POST['total_p']) && isset($_POST['subtotal_p']) && isset($_POST['shipping_p']) ){
  echo "herrrrrrrrrre"."<br>". $_POST['total_p']."<br>". $_POST['subtotal_p']."<br>". $_POST['shipping_p'];
}else{echo"nothing to show"; }

if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
  foreach($_SESSION['cart'] as $id){
    echo "<br>the id is:". $id."and the quantity ->";}}

    if(isset($_SESSION['client'])){
      // var_dump($_SESSION['client']);exit;
      echo "<br>".$_SESSION['client']->first_name;
    }


	




		
?>
	<!-- end check out section -->
<!-- logo_carousel -->
<?php include('layouts/logo_carousel.php'); ?>	
	<!-- end logo_carousel -->

	<!-- footer -->
	<?php include('layouts/footer.php'); ?>					
	<!-- end footer -->