<?php 
require_once('../includes/initialize.php'); 
 session_start();
require_login();



if(is_post_request() && isset($_POST['valider'])){
      
$id = $_GET['id'];

$order_p=Order_piece::find_quantity_by_id_order($id);

foreach($order_p as $stock){
  $qua=$stock->piece_quantity-$stock->order_piece_quantity;
  if($qua<0){
        //echo 'jazat la requete';
      
        $_SESSION['toast'] = true;
        $_SESSION['toastType'] = "la commande et pas valider";
        redirect_to('index.php');
  }else{
  // echo "<br>". $qua;
$ss=$stock->piece_id;
echo "<br>". $ss;
  $piece=Piece::find_by_id($ss);
  if($piece){
        $args = [];
        $args['quantity'] = $qua;
        $piece->merge_attributes($args);
      $result =$piece->update();

}}
  
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


























$order=Order::find_by_id($id);
   
  if($order){
    $args = [];
    $args['status'] = "valider";

   
    $order->merge_attributes($args);

  $result =$order->update();
 }
// //


  if($result){
    //echo 'jazat la requete';
    
    $_SESSION['toast'] = true;
    $_SESSION['toastType'] = "la commande et bien etes valider";
    redirect_to('index.php');
  }else{
     //echo 'mamchatch';
  }

}}
?>