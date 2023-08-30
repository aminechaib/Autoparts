	<!-- head -->

<?php 
  include('layouts/head.php'); 
	?>

	<?php
	//require_once("admin/includes/initialize.php");
	
	/////////////////////////////////////////////////////////////////////////////

if(is_post_request() && isset($_POST['ajouter'])){   
    //création et préparation de données pour les convertirs en objets 
      $args = [];
      $args['first_name'] = $_POST['first_name'] ?? NULL;
      $args['last_name'] = $_POST['last_name'] ?? NULL;
      $args['mobile_phone'] = $_POST['mobile_phone'] ?? NULL;
      $args['hashed_password'] = $_POST['hashed_password'] ?? NULL;
      $args['password'] = $_POST['password'] ?? NULL;
      $args['email'] = $_POST['email'] ?? NULL;  
      $args['adresse'] = $_POST['adresse'] ?? NULL;
      $args['id_ad'] = 1;

     // var_dump($args) . "<br>";
      
      $client = new Client($args);
      // var_dump($client);
      ///////////////////////////////////////////////
      $result = $client->check_validation();
      
      if($result === true){

        $_SESSION['toast'] = true;
        $_SESSION['toastType'] = "un ajout d'un client ";
        redirect_to('index.php');

      }else{
        session_start();
        $_SESSION['errors'] = $result;//ykhabi les erreurs ta3 validate()
        redirect_to('register.php');//bah yweli hna
      }}
      //////////////////////////////////////////////
	?>					
	<!-- end head -->
  <?php 
	include('layouts/header.php');
	 ?>	


	<?php 
  //include('admin/includes/menu_head.php'); 
  ?>
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Inscrivez-vous</p>
						<h1>Bienvenue chez AutoParts</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	<div class="contact-from-section mt-150 mb-150">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mb-5 mb-lg-0">
        <div class="form-title">
          <h2>"Vous n'avez pas de compte ?</h2>
          <p> Inscrivez-vous pour pouvoir passer des commandes de notre gamme de pièces automobiles en ligne.</p>
        </div>
        <div id="form_status"></div>
        <div class="contact-form">
          <form method="POST" class="add-to-cart-form" >
          
              <label for="first_name">Nom:</label>
                <p><input type="text" placeholder="Nom de client" name="first_name">
            </p>
              <label for="last_name">Prénom:</label>
              <p><input type="text" placeholder="Prénom de client" name="last_name" >
            </p>
              <label for="mobile_phone">Numéro de téléphone:</label>
             <p> <input type="text" placeholder="+213.." name="mobile_phone">
            </p>
              <label for="email">Email:</label>
               <p><input type="email" placeholder="exemple@gmail.com" name="email">
            </p>
              <label for="phone">Mot de pass:</label>
              <p><input type="password" name="hashed_password" >
            </p>
              <label for="subject">Confirmation du mot de passe:</label>
              <p><input type="password" name="password">
            </p>
			<label for="subject">Address:</label>
              <p><input type="text" name="adresse" placeholder=".....">
            </p>
			<p> <input type="submit" class="ui button" value="Inscription" name="ajouter"></p>
          </form>


		  <div class="<?php if(isset($_SESSION['errors']) and !empty($_SESSION['errors'])){ echo 'ui error message';} ?>">
  <br>
      <ul class="list-group">
    <?php
    if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $error) {
            echo '<li class="alert alert-danger col-lg-6">' . $error . '</li>';
        }
    }
    ?>
</ul>

                    </div>
    
        </div>
      </div>
				<div class="col-lg-4">
					<div class="contact-form-wrap">
						<div class="contact-form-box">
							<h4><i class="fas fa-map"></i> Notre Address</h4>
							<p>Rue cem med boudiaf <br> souidania,alger. <br> Algerie</p>
						</div>
						<div class="contact-form-box">
							<h4><i class="far fa-clock"></i>heure de travaille</h4>
							<p>samedi - jeudi: 8 AM a 9 PM </p>
						</div>
						<div class="contact-form-box">
							<h4><i class="fas fa-address-book"></i> Contact</h4>
							<p>Phone: +213 675 56 10 07 <br> Email: ccamine4@gmail.com</p>
						</div>
					</div>
				</div>
    </div>
  </div>
</div>


	<!-- find our location -->
	<div class="find-location blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p> <i class="fas fa-map-marker-alt"></i> Trouvez notre emplacement</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end find our location -->

	<!-- google map section -->
	<div class="embed-responsive embed-responsive-21by9">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3198.776745996894!2d2.904647674313292!3d36.7039023731245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128fa553cd88f7f3%3A0xe9898bd7bdef7ba4!2sPieces%20Auto!5e0!3m2!1sfr!2sdz!4v1690289316712!5m2!1sfr!2sdz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>	
</div>
	<!-- end google map section -->


	<?php

$_SESSION['errors'] = [];

?>
    <script>
    $('.menu .item')
        .tab();

    $('.ui.radio.checkbox')
        .checkbox();

    $('#particulier').change(function() {
        $("#myfield").hide(500, function() {

        });
        document.getElementById("myCheck").disabled = true;

    });
    $('#professionnel').change(function() {
        $("#myfield").show(500, function() {

        });
        document.getElementById("myCheck").disabled = false;

    });


    
       
    </script>




	<!-- footer -->
	<?php include('layouts/footer.php'); ?>					
	<!-- end footer -->