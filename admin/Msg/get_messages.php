


<?php
require_once("../includes/initialize.php");
if (isset($_GET['msg_id'])) {
  $msg_id = $_GET['msg_id'];
}
$msg= Msg_sent::find_by_id_cl($msg_id);
// var_dump($ord);
if ($msg) {
  foreach ($msg as $msgs) {
  ?>

<?php
$cl = $msgs->msg_cl;
$ad = $msgs->msg_ad;

if (!empty($cl)) {
    echo '<div class="client-bubble client">';
    echo "client:".$cl;
    echo '</div>';
}

if (!empty($ad)) {
    echo '<div class="admin-bubble admin">';
    echo "admin:".$ad;
    echo '</div>';
}
?>

  


  <?php
  
  
  
  }}
?>
<style>
 /* Define a container for the speech bubbles */
.bubble-container {
    display: flex;
    flex-direction: column;
}

/* Define the speech bubble styles for admin */
.admin-bubble {
    background-color: #3498db; /* Blue background color */
    color: white; /* Text color for admin messages */
    padding: 10px;
    border-radius: 10px;
    max-width: 200px;
    margin: 20px auto; /* Center admin messages horizontally */
    align-self: flex-start; /* Align admin messages to the left */
}

/* Define the speech bubble styles for client */
.client-bubble {
    background-color: #2ecc71; /* Green background color */
    color: white; /* Text color for client messages */
    padding: 10px;
    border-radius: 10px;
    max-width: 200px;
    margin: 20px auto; /* Center client messages horizontally */
    align-self: flex-end; /* Align client messages to the right */
}

