<?php
include('layouts/head.php'); 
if (isset($_SESSION['client'])) {
  $msg_id = $_SESSION['client']->id;}

// var_dump($ord);
$msg = Msg_sent::find_by_id_cl($msg_id);
?>
<section class="discussion">
	
<?php
// var_dump($ord);
if ($msg) {
    foreach ($msg as $msgs) {
        ?>
        <?php
        $cl = $msgs->msg_cl;
        $ad = $msgs->msg_ad;

        if (!empty($ad)) {
            echo '<div class="bubble sender first">';
       
            echo $ad;
           
            echo '</div>';
        }

        if (!empty($cl)) {
            echo '<div class="bubble recipient first">';
            
            echo $cl;
            echo '</div>';
        }
        ?>
        <?php
    }
}
?>

	
</section>
<style>
  html { font-family: 'PT Sans', Georgia, serif; }

.discussion {
	max-width: 600px;
	margin: 0 auto;
	
	display: flex;
	flex-flow: column wrap;
}

.discussion > .bubble {
	border-radius: 1em;
	padding: 0.25em 0.75em;
	margin: 0.0625em;
	max-width: 50%;
}

.discussion > .bubble.sender {
	align-self: flex-start;
	background-color: cornflowerblue;
	color: #fff;
}
.discussion > .bubble.recipient {
	align-self: flex-end;
	background-color: #efefef;
}

.discussion > .bubble.sender.first { border-bottom-left-radius: 0.1em; }
.discussion > .bubble.sender.last { border-top-left-radius: 0.1em; }
.discussion > .bubble.sender.middle {
	border-bottom-left-radius: 0.1em;
 	border-top-left-radius: 0.1em;
}

.discussion > .bubble.recipient.first { border-bottom-right-radius: 0.1em; }
.discussion > .bubble.recipient.last { border-top-right-radius: 0.1em; }
.discussion > .bubble.recipient.middle {
	border-bottom-right-radius: 0.1em;
	border-top-right-radius: 0.1em;
}
</style>