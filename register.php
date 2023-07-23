	<!-- head -->
	<?php include('layouts/head.php'); 
	?>
		
	<?php
	require_once("admin/includes/initialize.php");
	
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
      var_dump($client);
      ///////////////////////////////////////////////
      $result = $client->check_validation();
      
      if($result === true){

        $_SESSION['toast'] = true;
        $_SESSION['toastType'] = "un ajout d'un client ";
        redirect_to('index.php');

      }else{
        session_start();
        $_SESSION['errors'] = $result;//ykhabi les erreurs ta3 validate()
        redirect_to('index.php');//bah yweli hna
      }}
      //////////////////////////////////////////////
	?>					
	<!-- end head -->
	


	<?php include('admin/includes/menu_head.php'); ?>
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Get 24/7 Support</p>
						<h1>Contactez-nous</h1>
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
          <h2>Have you any question?</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, ratione! Laboriosam est, assumenda. Perferendis, quo alias quaerat aliquid. Corporis ipsum minus voluptate? Dolore, esse natus!</p>
        </div>
        <div id="form_status"></div>
        <div class="contact-form">
          <form method="POST" >
          
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
                        <ul class="list">
                                        
                        <?php
                             if(isset($_SESSION['errors']) and !empty($_SESSION['errors'])){ 
                            foreach ($_SESSION['errors'] as $error) {
                            
                                echo '<li>'. $error . '</li>';
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
            <h4><i class="fas fa-map"></i> Shop Address</h4>
            <p>34/8, East Hukupara <br> Gifirtok, Sadan. <br> Country Name</p>
          </div>
          <div class="contact-form-box">
            <h4><i class="far fa-clock"></i> Shop Hours</h4>
            <p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
          </div>
          <div class="contact-form-box">
            <h4><i class="fas fa-address-book"></i> Contact</h4>
            <p>Phone: +00 111 222 3333 <br> Email: support@fruitkha.com</p>
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
					<p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end find our location -->

	<!-- google map section -->
	<div class="embed-responsive embed-responsive-21by9">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26432.42324808999!2d-118.34398767954286!3d34.09378509738966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf07045279bf%3A0xf67a9a6797bdfae4!2sHollywood%2C%20Los%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2sbd!4v1576846473265!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" class="embed-responsive-item"></iframe>
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


    <?php 
require_once("admin/includes/app_foot.php");
?>

	<!-- footer -->
	<?php include('layouts/footer.php'); ?>					
	<!-- end footer -->