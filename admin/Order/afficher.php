
  <?php

  if(!$id){
    redirect_to('index.php');
  }
  $ord= Order::find_by_id_or($id);
  $pieces = Order_piece::find_by_id_order($id);
  $totalSum = 0; // Initialize the total sum
  $totalSalePrice = 0; // Initialize the total sale price
  

  

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
            <th>Total HT</th>	
			<th>Total TTC</th>
        </tr>
    </thead>
    <tbody>
    <tbody>
        <?php
    if ($pieces) {
        foreach ($pieces as $piece) {
            $pieceTotal = $piece->sale_price * $piece->quantity; // Calculate individual piece total
        	$totalSalePrice += $pieceTotal; // Add to the total sale price
			$pieceTotalWithTax = $pieceTotal * 0.19; // Apply 19% tax
			$totalSum += $pieceTotalWithTax+$pieceTotal; // Add to the total sum
									
        ?>
            <tr>
            <td><?php echo $piece->id; ?></td>
            <td><?php echo h($piece->name); ?></td>
            <td><?php echo ($piece->reference); ?></td>
            <td><?php echo h($piece->quantity); ?></td>
            <td><?php echo h($piece->sale_price." DA"); ?></td>
            <td><?php echo $pieceTotal . "DA"; ?></td>
			<td><?php echo $pieceTotalWithTax . "DA"; ?></td>
            <td></td>
        </tr>
        <?php
        }
        
        ?>
        	<!-- After the loop, add a row for the total sum -->
		<tr>
			<td colspan="5">TOTAL</td>
			<td><?php echo $totalSalePrice . "DA"; ?></td><td><?php echo $totalSum . "DA"; ?></td>
		</tr>
        <?php
         } 
    else {
        echo "No order piece found.";
    }?>
        <!-- Add a row for the total value -->
        
    </tbody>
</table>
<?php
foreach($ord as $orde){
    
    $status = h($orde->status);
    if ($status === "PENDING") {


   
?>
<form method="POST" class="ui form" id="modifier_form<?php echo $id ?>" action="valider.php?id=<?php echo $id ?>">


<input type="submit" value="VALIDER" name="valider" class="ui yellow button">
</form>
</body>
</html>
<?php
 }
else{

}
}
?>