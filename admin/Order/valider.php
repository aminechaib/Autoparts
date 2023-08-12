<?php 
require_once('../includes/initialize.php');
require_login();



if(is_post_request() && isset($_POST['valider'])){
      
$id = $_GET['id'];
$order=Order::find_by_id($id);
   
  if($order){
    $args = [];
    $args['status'] = "valider";

   
    $order->merge_attributes($args);

  $result =$order->update();

//
//order => id
// ceate new function on class order to find pieces for this (this id) order
// => array of piece ids and quantity (li tab3in lel order)

//foreach (loop on order piece )
// find_by_id piece => object (piece) from piece_order
// find quantity(real) selected from piece 

//args2[];
//args2['quantity(real)'] = $realpiece->quantity - $quantity(li tba3et)  
//$realpiece->mergeattribute(args2);
//$realpiece->update;

  if($result){
    //echo 'jazat la requete';
    session_start();
    $_SESSION['toast'] = true;
    $_SESSION['toastType'] = "la commande et bien etes valider";
    redirect_to('index.php');
  }else{
     //echo 'mamchatch';
  }
}}
?>