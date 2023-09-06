<?php 
require_once('../includes/initialize.php');
require_login();


function supprimer_modal($id_tab, $type_order){

    
    $id= $id_tab ?? false;
    include('supprimer_modal.php');

}

function afficher_modal($id_tab, $type_order){

    $id= $id_tab ?? false;
    include('get_messages.php');
    include('afficher.php');
    

}

function modifier_modal($id_tab, $type_order){

    $id= $id_tab ?? false;
  
    include('modifier_modal.php');

}


?>