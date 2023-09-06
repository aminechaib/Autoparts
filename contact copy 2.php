	<!-- head -->
	<?php include('layouts/head.php'); ?>					
	<!-- end head -->
	<!DOCTYPE html>
<html>
<head>
    <title>Simple Chat</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Simple Chat</h1>
    <div id="chat-box" style="height: 200px; border: 1px solid #ccc; overflow: auto;"></div>
    <input type="text" id="message" placeholder="Enter your message">
    <button onclick="sendMessage()">Send</button>

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
                data: { message: message },
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
</body>
</html>
