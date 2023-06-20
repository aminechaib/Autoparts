	<!-- head -->
	<?php include('layouts/head.php'); ?>					
	<!-- end head -->

	<!-- header -->
	<?php include('layouts/header.php'); ?>					
	<!-- end header -->

	<?php
	

	?>

	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Quality & Prix</p>
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
    <div class="row">
      <div class="col-lg-8 col-md-12">
        <div class="cart-table-wrap">
          <table class="cart-table">
            <thead class="cart-table-head">
              <tr class="table-head-row">
                <th class="product-remove"></th>
                <th class="product-image">Image</th>
                <th class="product-name">Nom</th>
                <th class="product-price">Prix</th>
                <th class="product-quantity">Quantité</th>
                <th class="product-total">Total</th>
              </tr>
            </thead>
            <tbody>


            


  <script>
    function removeFromCart(id) {
      // Store the current scroll position
      var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
      
      // Make an AJAX request to the server to remove the item from the cart
      fetch('remove_from_cart.php?id=' + id, { method: 'POST' })
        .then(response => {
          // Handle the response from the server, if needed
          // For example, you can update the UI or display a success message
          console.log('Item removed from cart');
          
          // Reload the current page to update the cart display
          window.scrollTo(0, scrollPosition);
          location.reload();
        })
        .catch(error => {
          // Handle any errors that occurred during the request
          console.error('Error removing item from cart:', error);
        });
    }
  </script>
              <?php
              if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $id){
                  $piece = Piece::find_by_id($id);
                  if($piece){
              ?>
              <tr class="table-body-row">
              <td class="product-remove"><a href="#" onclick="removeFromCart(<?php echo $piece->id; ?>)"><i class="far fa-window-close"></i></a></td>

        

                <td class="product-image">
                  <a href="single-product.php"><img src="admin/uploads/<?php echo $piece->photo; ?>" alt=""></a>
                </td>
                <td class="product-name"><?php echo $piece->name;?></td>
                <td class="product-price"><?php echo $piece->sale_price."  DZD" ; ?></td>
                <td>
                  <input type="number" name="quantity[]" class="inputQuantity" min="0" oninput="myFunction(this)" value="1">
                </td>
                <td class="product-total"><?php echo $piece->sale_price."  DZD" ; ?></td>
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
      <div class="col-lg-4 col-md-12">
        <table class="total-table">
          <thead class="total-table-head">
            <tr class="table-total-row">
            <th>Total</th>
              <th>Prix</th>
            </tr>
          </thead>
          <tbody>
            <tr class="total-data">
              <td><strong>Montant Total Hors Taxes: </strong></td>
              <td id="subtotal"></td>
            </tr>
            <tr class="total-data">
              <td><strong>TVA: </strong></td>
              <td id="shipping"></td>
            </tr>
            <tr class="total-data">
              <td><strong>Montant total TTC: </strong></td>
              <td id="total"></td>
            </tr>
            
          </tbody>
        </table>
        <div class="cart-buttons">
          <a href="cart.php?action=cancel" class="boxed-btn">Cancel</a>
          <a href="cart.php?action=update" class="boxed-btn">Update Cart</a>
          <a href="checkout.php" class="boxed-btn black">Check Out</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function myFunction(input) {
    var row = input.parentNode.parentNode;
    var priceString = row.querySelector('.product-price').innerText;
    var price = parseFloat(priceString.replace(/[^\d.]/g, ''));
    var quantity = input.value;
    var total = price * quantity;
    row.querySelector('.product-total').innerText = total.toFixed(2) + " DZD";
    updateTotal();
  }

  function updateTotal() {
    var rows = document.querySelectorAll('.cart-table tbody tr');
    var subtotal = 0;

    rows.forEach(function(row) {
      var quantityInput = row.querySelector('.inputQuantity');
      var quantity = parseInt(quantityInput.value);
      var priceString = row.querySelector('.product-price').innerText;
      var price = parseFloat(priceString.replace(/[^\d.]/g, ''));
      var rowTotal = price * quantity;
      subtotal += rowTotal;
    });

    var shippingPercentage = 0.19; // 19% shipping cost as a decimal
    var shipping = subtotal * shippingPercentage;
    var total = subtotal + shipping;

    document.getElementById('subtotal').innerText = subtotal.toFixed(2) + " DZD";
    document.getElementById('shipping').innerText = shipping.toFixed(2) + " DZD";
    document.getElementById('total').innerText = total.toFixed(2) + " DZD";
  }

  // Calculate the initial total
  updateTotal();
</script>

		
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