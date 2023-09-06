<?php
require_once("../includes/initialize.php");

// Retrieve the msg_id parameter from the URL
if (isset($_GET['msg_id'])) {
    $msg_id = $_GET['msg_id'];
}
?>

















<div class="chat-container">
    <div id="chat-box">
        <!-- Messages will be displayed here -->
    </div>
    <div class="message-input">
        <input type="text" id="message" placeholder="Enter your message">
        <button onclick="sendMessage()">Send</button>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function updateChat() {
            // Retrieve the msg_id from the URL
            var urlParams = new URLSearchParams(window.location.search);
            var msg_id = urlParams.get('msg_id');

            $.ajax({
                url: "get_messages.php",
                type: "GET",
                data: { msg_id: msg_id }, // Pass the msg_id as a parameter
                success: function(data) {
                    $("#chat-box").html(data);
                }
            });
        }

        function sendMessage() {
            var message = $("#message").val();
            var msg_id = "<?php echo isset($msg_id) ? $msg_id : ''; ?>"; // Get the msg_id from PHP

            $.ajax({
                url: "send_message.php",
                type: "POST",
                data: { message: message, msg_id: msg_id }, // Pass both message and msg_id
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
