<!-- footer -->
<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
					<h2 class="widget-title">À propos de nous</h2>
						<p>Nous sommes une entreprise dédiée à la vente de pièces automobiles de qualité en Algérie. Notre objectif principal est de fournir à nos clients des pièces détachées pour véhicules de haute qualité et fiables, afin de garantir la sécurité et la performance de leurs voitures.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Entrer en contact</h2>
						<ul>
							<li>Rue cem med Boudiaf souidania.</li>
							<li>ccamine4@gmail.com</li>
							<li>+213 675 56 10 07</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="index.php">Accueil</a></li>
							<li><a href="about.php">À propos</a></li>
							<li><a href="services.php">Produit</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">S'abonner</h2>
						<p>Abonnez-vous à notre liste de diffusion pour obtenir les dernières mises à jour.</p>
						<form action="index.php">
							<input type="email" placeholder="Email">
							<button type="submit"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2023 - <a href="">Auto Parts</a>,  All Rights Reserved.</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="toast/toast.js"></script>
	<script type="text/javascript">
    
	$(document).ready(function(){
		$('#mark').on('change',function(){
			var markID = $(this).val();
			if(markID){
				$.ajax({
					type:'POST',
					url:'fetch_model.php',
					data:'id='+markID,
					success:function(html){
						$('#model').html(html);
					
					}
				}); 
			}else{
				$('#model').html('<option value="">Select category first</option>');
				
			}
		});
		
		
	});

	$(document).ready(function(){
		$('#model').on('change',function(){
			//console.log('ok');
			var modelID = $(this).val();
			if(modelID){
				$.ajax({
					type:'POST',
					url:'fetch_motor.php',
					data:'id='+modelID,
					success:function(html){
						$('#moteur').html(html);
					
					}
				}); 
			}else{
				$('#moteur').html('<option value="">Select category first</option>');
				
			}
		});
		
		
	});


	$(document).ready(function(){
		$('#moteur').on('change',function(){
			//console.log('ok');
			var compatibleID = $(this).val();
			if(compatibleID){
				$.ajax({
					type:'POST',
					url:'fetch_piece.php',
					data:'id='+compatibleID,
					success:function(html){
						$('#compatible').html(html);
					
					}
				}); 
			}else{
				$('#moteur').html('<option value="">Select category first</option>');
				
			}
		});
		
		
	});

	<?php
		if($_SESSION['addedToCart'])
		{
	?>
	toastr.options = {
		'closeButton': false,
		'debug': false,
		'newestOnTop': false,
		'progressBar': false,
		'positionClass':'toast-top-right',
		'preventDuplicates': false,
		'onclick': null,
		'showDuration':'2000',
		'hideDuration':'100',
		'timeOut':'2000',
		'extendedTimeOut':'100',
		'showEasing':'swing',
		'hideEasing':'linear',
		'showMethod':'fadeIn',
		'hideMethod':'fadeOut'
	}
	toastr.success('piece ajouté!');	
	<?php
		}
		$_SESSION['addedToCart'] = false;
	?>
	<?php
		if($_SESSION['success_order'])
		{
	?>
	toastr.options = {
		'closeButton': false,
		'debug': false,
		'newestOnTop': false,
		'progressBar': false,
		'positionClass':'toast-top-right',
		'preventDuplicates': false,
		'onclick': null,
		'showDuration':'2000',
		'hideDuration':'100',
		'timeOut':'2000',
		'extendedTimeOut':'100',
		'showEasing':'swing',
		'hideEasing':'linear',
		'showMethod':'fadeIn',
		'hideMethod':'fadeOut'
	}
	toastr.success('order ajouté!');	
	<?php
		}
		$_SESSION['success_order'] = false;
	?>
	</script>




<script>
  const filterInput = document.getElementById('productFilter');
  const productContainer = document.getElementById('compatible');

  filterInput.addEventListener('input', function() {
    const searchTerm = filterInput.value.trim().toLowerCase();

    Array.from(productContainer.getElementsByClassName('single-product-item')).forEach(item => {
      const productName = item.querySelector('h3').textContent.toLowerCase();
      const productReference = item.querySelector('h3').textContent.toLowerCase();
	  const productcategory = item.querySelector('h3').textContent.toLowerCase();
      
      if (productName.includes(searchTerm) || productReference.includes(searchTerm) || productReference.includes(searchTerm)) {
        item.style.display = 'block';
      } else {
        item.style.display = 'none';
      }
    });
  });
</script>


<script>
  $(document).ready(function() {
    // Store the current scroll position when the form is submitted
    $('.add-to-cart-form').on('submit', function() {
      var scrollPosition = $(window).scrollTop();
      sessionStorage.setItem('scrollPosition', scrollPosition);
    });

    // Restore the scroll position on page load
    var storedScrollPosition = sessionStorage.getItem('scrollPosition');
    if (storedScrollPosition) {
      $(window).scrollTop(storedScrollPosition);
      sessionStorage.removeItem('scrollPosition');
    }
  });
</script>
<!-- JavaScript to handle button click and update modal content -->
<script>
    $(document).ready(function() {
        $('.open-modal').click(function() {
            var selectedValue = $(this).data('value'); // Get the value from data-value attribute
            
            $('#selectedValueDisplay').html("You selected: " + selectedValue);
            
            // Send the selected value back to the server using AJAX
            $.ajax({
                type: "POST",
                url: "ajax-handler.php", // Add the correct URL of the PHP script
                data: { selectedValue: selectedValue },
                success: function(response) {
                    console.log("Value sent to the server: " + selectedValue);
                    // Display the server response in the modal body
                    $('#selectedValueDisplay').html(response);
                }
            });
        });
    });
	
</script>

<!-- JavaScript to handle button click and update modal content -->
<script>
    $(document).ready(function() {
        $('.dele-modal').click(function() {
            var selectedValue = $(this).data('value'); // Get the value from data-value attribute
            
            $('#selectedValueDisplay').html("You selected: " + selectedValue);
            
            // Send the selected value back to the server using AJAX
            $.ajax({
                type: "POST",
                url: "delete_ord.php", // Add the correct URL of the PHP script
                data: { selectedValue: selectedValue },
                success: function(response) {
                    console.log("Value sent to dddddddr: " + selectedValue);
                    // Display the server response in the modal body
                    $('#selectedValueDisplay').html(response);
                }
            });
        });
    });
	
</script>
</body>
</html>