


<?php
require_once("../includes/initialize.php");
if (isset($_GET['msg_id'])) {
  $msg_id = $_GET['msg_id'];
}
$msg = Msg_sent::find_by_id_cl($msg_id);
// var_dump($ord);
if ($msg) {
    foreach ($msg as $msgs) {
        ?>
        <?php
        $cl = $msgs->msg_cl;
        $ad = $msgs->msg_ad;

        if (!empty($cl)) {
            echo '<div class="client-bubble bubble">';
            echo '<div class="bubble-content">';
            echo $cl;
            echo '</div>';
            echo '</div>';
        }

        if (!empty($ad)) {
            echo '<div class="admin-bubble bubble">';
            echo '<div class="bubble-content">';
            echo $ad;
            echo '</div>';
            echo '</div>';
        }
        ?>
        <?php
    }
}
?>

<style>
    /* Define a container for the speech bubbles */
    .bubble-container {
        display: flex;
        flex-direction: column;
    }

    /* Define the speech bubble styles for admin and client */
    .bubble {
        position: relative;
        max-width: 200px;
        margin: 20px 0;
        padding: 10px;
        border-radius: 10px;
        color: white;
        font-size: 16px;
    }

    /* Define the speech bubble styles for admin */
    .admin-bubble {
        background-color: #3498db; /* Blue background color */
        margin-left: auto; /* Align admin messages to the right */
    }

    /* Define the speech bubble styles for client */
    .client-bubble {
        background-color: #2ecc71; /* Green background color */
        margin-right: auto; /* Align client messages to the left */
    }

    /* Create a tail for admin messages */
    .admin-bubble::before {
        content: '';
        position: absolute;
        top: 50%;
        right: -10px; /* Adjust the tail position */
        border-width: 10px;
        border-style: solid;
        border-color: transparent transparent transparent #3498db; /* Blue background color */
        transform: translateY(-50%);
    }

    /* Create a tail for client messages */
    .client-bubble::before {
        content: '';
        position: absolute;
        top: 50%;
        left: -10px; /* Adjust the tail position */
        border-width: 10px;
        border-style: solid;
        border-color: transparent #2ecc71 transparent transparent; /* Green background color */
        transform: translateY(-50%);
    }
</style>
