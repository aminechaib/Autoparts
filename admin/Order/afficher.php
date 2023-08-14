
  <?php
  if(!$id){
    redirect_to('index.php');
  }
  echo "the id is".$id;
  $pieces = Order_piece::find_by_id_order($id);
  var_dump($pieces);

  

//   var_dump($pieces);
//   if ($pieces) {
//     foreach ($pieces as $order_pi) {
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
            <th>id</th>
            <th>Piece</th>
            <th>Reference</th>
            <th>Quantity</th>
            <th>prix</th>
            <th>total HT</th>
            <th>total TTC</th>
        </tr>
    </thead>
    <tbody>
    <tbody>
        <?php
    if ($pieces) {
        foreach ($pieces as $piece) {
        ?>
            <tr>
            <td><?php echo $piece->id; ?></td>
            <td><?php echo h($piece->name); ?></td>
            <td><?php echo ($piece->reference); ?></td>
            <td><?php echo h($piece->quantity); ?></td>
            <td><?php echo h($piece->sale_price." DA"); ?></td>
            <input type="hidden" name="status">
            <td><?php echo h($piece->quantity*$piece->sale_price." DA"); ?></td>
            <td></td>
        </tr>
        <?php
        }
        
         } 
    else {
        echo "No order piece found.";
    }?>
        <!-- Add a row for the total value -->
        
    </tbody>
</table>
<form method="POST" class="ui form" id="modifier_form<?php echo $id ?>" action="valider.php?id=<?php echo $id ?>">
<input type="submit" value="Valider" name="valider" class="ui yellow button">
</form>
</body>
</html>
<?php

?>