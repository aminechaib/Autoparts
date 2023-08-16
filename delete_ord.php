<?php require_once('./admin/includes/initialize.php'); ?>
<?php
if (isset($_POST['selectedValue'])) {
  $id = $_POST['selectedValue'];
  echo $id;
  $order=Order::find_by_id($id);
   
  if($order){
    $args = [];
    $args['is_deleted'] = "OUI Suprimer :".date('Y-m-d H:m:s');

   
    $order->merge_attributes($args);

  $result =$order->update();
  }
}
?>
