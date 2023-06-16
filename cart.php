	<!-- head -->
	<?php include('layouts/head.php'); ?>					
	<!-- end head -->

	<!-- header -->
	<?php include('layouts/header.php'); ?>					
	<!-- end header -->

	<?php
	
	// search and get on piece table by ids
	// select from piece where IN $_SESSION['cart] 
	// object of pices nom, prix, photo
	// foreach on pices object 
	?>

	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
		<form action="" method="POST">
			<div class="row">
			
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
								
							<table class="cart-table">
								<thead class="cart-table-head">
									<tr class="table-head-row">
										<th class="product-remove"></th>
										<th class="product-image">Product Image</th>
										<th class="product-name">Name</th>
										<th class="product-price">Price</th>
										<th class="product-quantity">Quantity</th>
										<th class="product-total">Total</th>
										
									</tr>
								</thead>
								<tbody>
									<?php
									// $pieces = Piece::find_by_id_in(); 
									// var_dump($pieces);exit;
									//    if($pieces){ var_dump($pieces);
										//    foreach($pieces as $piece){
											if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
											foreach($_SESSION['cart'] as $id){
												$piece = Piece::find_by_id($id);
												if($piece){
									?>
										
									
										<tr class="table-body-row">
										<td class="product-remove"><a href="cart.php?action=remove&id=<?php echo $piece->id; ?>"><i class="far fa-window-close"></i></a></td>
											
										<?php
										if(isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['id'])){
											$id_to_remove = $_GET['id'];
											if(Piece::delete_from_cart($id_to_remove)){
												echo "ID " . $id_to_remove . " removed from cart.";
											}else{
												echo "ID " . $id_to_remove . " not found in cart.";
											}
										}

										
										?>
										<p>
										<input type="text" name="piece_id[]" value="<?php echo $piece->id ?>">
										
										<input type="text" name="price[]" value="<?php echo $piece->sale_price; ?>">
										</p>
										


										
										<td class="product-image">
												<a href="single-product.php"><img src="admin/uploads/<?php echo $piece->photo; ?>" alt=""></a></td>
											<td class="product-name"><?php echo $piece->name;?></td>
											<td class="product-price" name="sale"><?php echo $piece->sale_price."  DZD" ; ?></td>
											<td><input type="number" name="quantity[]" placeholder="1"></td>
											
											<?php
if (isset($_POST['sub']) && isset($_POST['piece_id']) && isset($_POST['quantity']) && isset($_POST['price'])) {
    $piece_ids = $_POST['piece_id'];
    $quantities = $_POST['quantity'];
    $prices = $_POST['price'];

    if (is_array($piece_ids) && is_array($quantities) && is_array($prices)) {
        $totalValues = [];

        for ($i = 0; $i < count($piece_ids); $i++) {
            $piece_id = $piece_ids[$i];
            $quantity = $quantities[$i];
            $price = $prices[$i];

            $totalValue = $quantity * $price;

            $totalValues[$piece_id] = $totalValue;
        }

 ?>
											<?php
										} else {
        echo "Invalid input data. Please make sure the form fields are submitted as arrays.";
    }
}
?>
											<?php
											
											}else{
												echo "Piece with ID " . $id . " not found.";
											}
										

											  
											
									}}else{
										echo "Cart is empty.";
									}
										?>
											<td class="product-price">vide</td>
											<?php       // Output total values for each piece
        foreach ($totalValues as $piece_id => $totalValue) {
            ?>
											<td class="product-price"><?php echo $totalValue ?></td>
											<?php
        }
?>									
										</tr>
										<?php 
									?>
								</tbody>
							</table>
							
							</p>
							<p><input type="submit" name="sub"></p>	
						
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td>$500</td>
								</tr>
								<tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<td>$45</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>$545</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="cart.php?action=cancel" class="boxed-btn">Cancel</a>
							<a href="cart.php?action=update" class="boxed-btn">Update Cart</a>
							<a href="checkout.php" class="boxed-btn black">Check Out</a>
						</div>
					</div>

					<div class="coupon-section">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<!-- <form action="index.php">
								<p><input type="text" placeholder="Coupon"></p>
								<p><input type="submit" value="Apply"></p>
							</form> -->
						</div>
					</div>
				</div>
			
			</div>
			</form>
		</div>
	</div>
	<!-- end cart -->
<!-- logo_carousel -->
<?php include('layouts/logo_carousel.php'); ?>	
	<!-- end logo_carousel -->

<script>
	function getTotalPrice(param){
		let el = document.getElementById('prix_total');
		el.innerText = param;
	}
</script>
<!-- footer -->
<?php include('layouts/footer.php'); ?>					
	<!-- end footer -->