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
						<p>Get 24/7 Support</p>
						<h1>Contactez-nous</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	<?php
				if (isset($_SESSION['client'])) {
					$id = $_SESSION['client']->id;
				} else {
					redirect_to(url_for('index.php', 'front'));
				}
				?>
	<!-- contact form -->
	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Avez-vous des questions ?</h2>
						<p>N'hésitez pas à nous contacter si vous avez des questions ou si vous avez besoin de plus d'informations sur nos pieces!</p>
					</div>
					<div id="form_status"></div>
					<div class="contact-form">
					
<div class="chat-container">
    <div id="chat-box">
        <!-- Messages will be displayed here -->
    </div>
    <div class="message-input">
        <input type="text" id="message" placeholder="Enter your message">
        <button onclick="sendMessage()">Envoyer</button>
    </div>
</div>

<style>
    /* Define a container for the entire chat interface */
.chat-container {
    display: flex;
    flex-direction: column;
    justify-content: flex-end; /* Push chat box and input to the bottom */
    height: 400px; /* Set a fixed height for the chat container */
}

/* Define styles for the chat input */
.message-input {
    display: flex;
    align-items: center;
    padding: 10px;
    background-color: #f5f5f5; /* Background color for input area */
}

.message-input input[type="text"] {
    flex: 1;
    padding: 10px;
    border: none;
    border-radius: 5px;
    margin-right: 10px;
}

.message-input button {
    background-color: #3498db; /* Blue send button color */
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 15px;
    cursor: pointer;
}


    /* Define a container for the entire chat interface */
    .chat-container {
    display: flex;
    flex-direction: column;
    justify-content: flex-end; /* Push chat box and input to the bottom */
    height: 400px; /* Set a fixed height for the chat container */
    overflow: hidden; /* Hide overflow content */
    border: 1px solid #ccc; /* Add a border for the chat container */
    border-radius: 5px;
}

/* Define the chat box styles */
#chat-box {
    flex: 1; /* Allow the chat box to grow and take available space */
    overflow-y: auto; /* Enable vertical scrolling */
    padding: 10px;
    background-color: #ffffff; /* Background color for chat box */
}


</style>
						<script>
							function updateChat() {
								$.ajax({
									url: "get_messages.php",
									type: "GET",
									success: function(data) {
										$("#chat-box").html(data);
									}
								});
							}

							function sendMessage() {
								var message = $("#message").val();
								$.ajax({
									url: "send_message.php",
									type: "POST",
									data: {
										message: message
									},
									success: function() {
										$("#message").val('');
										updateChat();
									}
								});
							}

							// Poll for updates every 2 seconds
							setInterval(updateChat, 2000);

							// Initial chat load
							updateChat();
						</script>
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
	<!-- end contact form -->

	<!-- find our location -->
	<div class="find-location blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p> <i class="fas fa-map-marker-alt"></i>Trouvez notre emplacement</p>
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