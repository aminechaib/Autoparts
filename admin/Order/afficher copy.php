<?php
  if(!$id){
    redirect_to('index.php');
  }
$order_data = Order_piece::find_by_id_order($id); // Retrieve data for the order


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
        <?php
        $totalValue = 0; // Initialize the total value variable
        foreach ($order_data as $order) {
            $totalValue += $order->quantity * $order->sale_price; // Calculate total value
        ?>
            <tr>
                <td><?php echo h($order->name); ?></td>
                <td><?php echo h($order->quantity); ?></td>
                <td><?php echo h($order->sale_price." DA"); ?></td>
                <?php  $quantity=$order->quantity; 
                $sale_price=$order->sale_price; 
                ; ?>
                <td><?php echo h($order->status); ?></td>
                <input type="hidden" name="status">
                <td><?php echo h($quantity*$sale_price." DA"); ?></td>
                <td></td>
            </tr>
        <?php } ?>
        <!-- Add a row for the total value -->
        <tr>
            <td colspan="4">total</td>
            <td>Total HT: <?php echo h($totalValue." DA"); ?></td>
            <td>Total TTC: <?php echo h($totalValue*0.19+$totalValue." DA"); ?></td>
        </tr>
    </tbody>
</table>
<form method="POST" class="ui form" id="modifier_form<?php echo $id ?>" action="valider.php?id=<?php echo $id ?>">
<input type="submit" value="Valider" name="valider" class="ui yellow button">
</form>
</body>
</html>
<?php

?>