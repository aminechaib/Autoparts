
  <?php
  if(!$id){
    redirect_to('index.php');
  }
  echo "the id is".$id;
  $order_piece = Order_piece::find_by_id_order($id); // Retrieve data for the order
  var_dump($order_piece);
//   var_dump($order_piece);
//   if ($order_piece) {
//     foreach ($order_piece as $order_pi) {
//       echo var_dump($order_pi);
//     }
//   } else {
//     echo "No order pieces found.";
//   }
  

    // Access properties of $order and echo the information
?>
                           
<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
</head>
<body>

<table class="ui striped table" id="tabAll">
    <thead>
        <tr>
            <th>Piece</th>
            <th>Quantity</th>
            <th>prix</th>
            <th>status</th>
            <th>total HT</th>
            <th>total TTC</th>
        </tr>
    </thead>
    <tbody>
   
    </tbody>
</table>
<form method="POST" class="ui form" id="modifier_form<?php echo $id ?>" action="valider.php?id=<?php echo $id ?>">
<input type="submit" value="Valider" name="valider" class="ui yellow button">
</form>
</body>
</html>
<?php

?>

<?php
        $totalValue = 0; // Initialize the total value variable
        foreach ($order_piece as $order) {

   
   } ?>





