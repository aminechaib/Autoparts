<?php
require_once("../includes/initialize.php");
if (isset($_POST['msg_id'])) {
  $id = $_POST['msg_id'];
}
$args = [];
$args['id_cl']=$id;
$msginstant = new Msg();
$msg = $msginstant->create();
$id_msg = $msginstant->id; 
 //création et préparation de données pour les convertirs en objets 
 $args = [];
 $args['msg_ad'] = $_POST['message'] ?? NULL;
 $args['id_msg'] = $id_msg;
// var_dump($args) . "<br>";
 $msgsent = new Msg_sent($args);
 //var_dump($msgsent);
 ///////////////////////////////////////////////
 $result = $msgsent->check_validation();
?>
