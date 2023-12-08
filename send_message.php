<?php
include('layouts/head.php'); 
$id=$_SESSION['client']->id;
$args = [];
$args['id_cl']=$id;
$msginstant = new Msg();
$msg = $msginstant->create();
$id_msg = $msginstant->id; 
 //création et préparation de données pour les convertirs en objets 
 $args = [];
 $args['msg_cl'] = $_POST['message'] ?? NULL;
 $args['id_msg'] = $id_msg;
// var_dump($args) . "<br>";
 $msgsent = new Msg_sent($args);
 //var_dump($msgsent);
 ///////////////////////////////////////////////
 $result = $msgsent->check_validation();
?>
