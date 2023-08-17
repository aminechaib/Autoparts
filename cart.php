	<!-- head -->
	<?php include('layouts/head.php'); ?>					
	<!-- end head -->
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
              <?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $inputs = array();
  
  if (isset($_POST['checkout']) && isset($_SESSION['cart']) > 0) {
      $data = array();

      for ($i = 0; $i < count($_SESSION['cart']); $i++) {
          $data[$i] = array(
              'id' => $_SESSION['cart'][$i],
              'sale_price' => $_POST['sa_price'][$i],
              'quantity' => $_POST['quantity'][$i],
          ); 
    }  
      $orderInstance = new Order();
      $order = $orderInstance->create();
      $id_order = $orderInstance->id; 
   
      //var_dump($id_order);exit;
      // var_dump($data);exit;
      // echo $id_order;

      
      foreach ($data as $key => $args) {
        
         $order_piece = new Order_piece($id_order, $args);
        // var_dump($args);
      
        $order_pieces = $order_piece->create();
      }
      unset($_SESSION['cart']);unset($data);
      $_SESSION['clean_cart'] = true;
      $_SESSION['success_order'] = true;
   ?>
   <script>
    document.getElementById('a').value=1;
   </script>
   <?php
    $_SESSION['form_inputs'] = $inputs;
   

  
  
    //header("Location: checkout.php"); // Redirect to the display page  
  }else
  {
    redirect_to(url_for('index.php', 'front'));
  }
}
?>
    <form action="" method="POST">
                    <th class="product-remove"></th>
                    <th class="product-image">Image</th>
                    <th class="product-name">Nom</th>
                    <th class="product-reference">reference</th>
                   
                    <th class="product-price">Prix</th>
                    <th class="product-quantity">Quantité</th>
                    <th class="product-total">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $id) {
                      // var_dump($_SESSION['cart']);
                        $piece = Piece::find_by_id($id);
                         if ($piece) {      
                     //     var_dump($piece);
                            ?>
                     
                            <tr class="table-body-row">
                                <td class="product-remove">
                                    <a href="#" onclick="removeFromCart(<?php echo $piece->id; ?>)">
                                    <i class="far fa-window-close"></i>
                                    </a>
                                   
                               <input type="hidden" value="<?php echo $piece->quantity; ?>" class="stock">
                               </td>
                                </td>
                                <td class="product-image">
                                    <a href="single-product.php"><img src="admin/piece_name/uploads/<?php echo $piece->photo; ?>" alt=""></a>
                                </td>
                                <td class="product-name">
                                    <?php echo $piece->piece_name; ?>
                                    <input type="hidden" value="<?php  echo $piece->piece_name;  ?>" name="pr_name[]">
                                </td>
                                <td class="product-reference">
                                    <?php echo $piece->reference; ?> 
                                    <input type="hidden" value="<?php  echo $piece->reference;  ?>" name="pr_reference[]">
                               </td>
                                <td class="product-price">
                                    <?php echo $piece->sale_price . "  DZD"; ?>
                                    <input type="hidden" name="sa_price[]" value="<?php echo $piece->sale_price; ?>">
                                </td>
                              
                                <td>
                                    <input type="number" id="quant" name="quantity[]" class="inputQuantity" min="1" oninput="myFunction(this)" value="1">
                                    <div class="maxQuantityMsg" style="color: red;"></div>
    </td>

                                <td class="product-total"><?php echo $piece->sale_price . "  DZD"; ?></td>
                            </tr>
                            <?php
                        }
                    }
                }
                ?>
            </tbody>
        </table>
       
  
</body>
</html>

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
              <td><strong>TVA 19%: </strong></td>
              <td id="shipping"></td>
            </tr>
            <tr class="total-data">
              <td><strong>Montant total TTC: </strong></td>
              <td id="total"></td>
            </tr>
            
          </tbody>
        </table>
        <input type="hidden" name="total_p" id="total_p">
        <input type="hidden" name="subtotal_p" id="subtotal_p">
        <input type="hidden" name="shipping_p" id="shipping_p">
        <input type="submit" value="checkout" name="checkout">
        </div>
      </div>
    </div>
  </div>
</div>
	<!-- header -->
	<?php include('layouts/header.php'); ?>					
	<!-- end header -->

<!-- ... previous HTML code ... -->
<?php
if(isset($_SESSION['clean_cart']))
{?>
  <script>
    localStorage.clear();
  </script>
<?php
$_SESSION['clean_cart'] = false;
}
?>
<script>
  

function removeFromCart(id) {
    // Store the current scroll position
    var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

    // Remove the item from the cart in the server
    fetch('remove_from_cart.php?id=' + id, { method: 'POST' })
      .then(response => {
        // Handle the response from the server, if needed
        // For example, you can update the UI or display a success message
        console.log('Item removed from cart');

        // Remove the corresponding quantity value from local storage
        localStorage.removeItem('quantity_' + id);

        // Reload the current page to update the cart display
        window.scrollTo(0, scrollPosition);
        location.reload();
      })
      .catch(error => {
        // Handle any errors that occurred during the request
        console.error('Error removing item from cart:', error);
      });
  }


  function myFunction(input) {
    var row = input.parentNode.parentNode;
    var priceString = row.querySelector('.product-price').innerText;
    var price = parseFloat(priceString.replace(/[^\d.]/g, ''));
    var quantity = input.value;
    console.log(quantity);
    var total = price * quantity;
    row.querySelector('.product-total').innerText = total.toFixed(2) + " DZD";
    updateTotal();
    storeQuantity(input); // Store the updated quantity in local storage

    
    var row = input.closest('tr');
    var stockInput = row.querySelector('.stock');
    var quantInput = row.querySelector('.inputQuantity');
    var maxQuantityMsg = row.querySelector('.maxQuantityMsg');
    
    var stockValue = parseInt(stockInput.value);
    quantInput.max = stockValue;
    
    var quantValue = parseInt(quantInput.value);
    if (quantValue > stockValue) {
        quantInput.value = stockValue;
        maxQuantityMsg.textContent = "La quantité ne peut pas dépasser le stock disponible, !";
    } else {
        maxQuantityMsg.textContent = "";
    }
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
    document.getElementById('total_p').value = total.toFixed(2) + " DZD";
    document.getElementById('shipping_p').value = shipping.toFixed(2) + " DZD";
    document.getElementById('subtotal_p').value = subtotal.toFixed(2) + " DZD";
   }

  // Store the quantity value in local storage
  function storeQuantity(input) {
    var row = input.parentNode.parentNode;
    var id = row.querySelector('.product-remove a').getAttribute('onclick').match(/\d+/)[0];
    localStorage.setItem('quantity_' + id, input.value);
  }

  // Retrieve the quantity values from local storage
  function retrieveQuantity() {
    var inputs = document.querySelectorAll('.inputQuantity');
    inputs.forEach(function(input) {
      var row = input.parentNode.parentNode;
      var id = row.querySelector('.product-remove a').getAttribute('onclick').match(/\d+/)[0];
      var storedQuantity = localStorage.getItem('quantity_' + id);
      if (storedQuantity) {
        input.value = storedQuantity;
        myFunction(input); // Update the product total based on the stored quantity
      }
    });
  }

  // Calculate the initial total
  updateTotal();
  
  // Retrieve the quantity values when the page loads
  retrieveQuantity();
</script>

<!-- ... remaining HTML code ... -->

		
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