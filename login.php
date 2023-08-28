<?php include('layouts/head.php'); ?>

<!-- header -->

<?php require_once("admin/includes/initialize.php"); ?>

<?php
$errors = [];
$username = '';
$password = '';
if (is_post_request() && isset($_POST['ajouter'])) {

	$mobile_phone = $_POST['mobile_phone'] ?? '';
	$password = $_POST['password'] ?? '';

	// Validations
	if (is_blank($mobile_phone)) {
		$errors[] = "numéro de téléphone est vide!";
	}
	if (is_blank($password)) {
		$errors[] = "mot de passe est vide!";
	}

	// if there were no errors, try to login
	if (empty($errors)) {
		$client = Client::find_by_phone($mobile_phone);
		//var_dump($client);exit;
		// test if admin found and password is correct
		if ($client != false && $client->verify_password($password)) {

			// Mark client as logged in
			$session->login($client, 'client');
			//   echo("jazet.php");
			redirect_to('index.php');
		} else {
			// phone_number not found or password does not match
			$errors[] = "mot de passe ou numéro de téléphone erroné :/ ";
		}
	}
}
?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Piece de Haut Quality</p>
					<h1>Bien venue</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<?php include('layouts/header.php'); ?>

<!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mb-5 mb-lg-0">
				
				<div class="form-title">
					<h2>Login</h2>
				</div>
				<div id="form_status"></div>
				<div class="contact-form">

					<form method="POST" id="fruitkha-contact" class="add-to-cart-form" onSubmit="return valid_datas( this );">
						<p>
							<input type="text" placeholder="Numero de telephone" name="mobile_phone" id="na">
						</p>
						<p>
							<input type="password" placeholder="Mot de pass" name="password">
						</p>
						<input type="hidden" name="token" value="FsWga4&@f6aw" />
						<p><input type="submit" name="ajouter" value="connecter"></p>
					</form>
				</div>
				<br>
				<?php if (!empty($errors)) { ?>
					<div class="alert alert-danger col-lg-6">
						<ul>
							<?php foreach ($errors as $error) { ?>
								<li ><?php echo $error; ?></li>
							<?php } ?>
						</ul>
					</div>
				<?php } ?>
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
	<!-- end contact form -->

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


	<!-- footer -->
	<?php include('layouts/footer.php'); ?>
	<!-- end footer -->