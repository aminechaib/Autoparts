<?php require_once('./admin/includes/initialize.php'); ?>

<?php
if (isset($_POST['selectedValue'])) {
    $selectedValue = $_POST['selectedValue'];
   
?>
	<table class="order-details">
				<thead>
					<tr>
						<th>id</th>
						<th>Piece</th>
						<th>reference</th>
						<th>quantity</th>
						<th>prix</th>	
						<th>Total HT</th>	
						<th>Total TTC</th>	
					</tr>
				</thead>
				<tbody class="order-details-body">
					<?php
							
							$pieces = Order_piece::find_by_id_order($selectedValue);
				
						
							$totalSum = 0; // Initialize the total sum
							$totalSalePrice = 0; // Initialize the total sale price
							
							if ($pieces) {
								foreach ($pieces as $piece) {
									$pieceTotal = $piece->sale_price * $piece->quantity; // Calculate individual piece total
									$totalSalePrice += $pieceTotal; // Add to the total sale price
									$pieceTotalWithTax = $pieceTotal * 0.19; // Apply 19% tax
									$totalSum += $pieceTotalWithTax+$pieceTotal; // Add to the total sum
									?>
									<tr>
										<td><?php echo h($piece->id); ?></td>
										<td><?php echo h($piece->name); ?></td>
										<td><?php echo h($piece->reference); ?></td>
										<td><?php echo h($piece->quantity); ?></td>
										<td><?php echo h($piece->sale_price); ?></td>
										<td><?php echo $pieceTotal . "DA"; ?></td>
										<td><?php echo $pieceTotalWithTax . "DA"; ?></td>
									</tr>
									<?php
								}
							}
							?>
							
							<!-- After the loop, add a row for the total sum -->
							<tr>
								<td colspan="5">TOTAL</td>
								<td><?php echo $totalSalePrice . "DA"; ?></td><td><?php echo $totalSum . "DA"; ?></td>
							</tr>
							
						
					
				</tbody>
			</table>

<?php









    
} else {
    echo "No value received.";
}
?>
