<?php 
require_once('../includes/initialize.php');
require_login();



if(is_post_request() && isset($_POST['valider'])){
      
$id = $_GET['id'];

$order_p=Order_piece::find_quantity_by_id_order($id);

foreach($order_p as $stock){
  $qua=$stock->piece_quantity-$stock->order_piece_quantity;
  
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

$order=Order::find_by_id($id);
   
  if($order){
    $args = [];
    $args['status'] = "VALIDER";

   
    $order->merge_attributes($args);

  $result =$order->update();
 }
// //


  if($result){
    //echo 'jazat la requete';
    session_start();
    $_SESSION['toast'] = true;
    $_SESSION['toastType'] = "la commande et bien etes VALIDER";
    redirect_to('index.php');
  }else{
     //echo 'mamchatch';
  }

}
?>