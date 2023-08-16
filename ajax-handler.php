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
					</tr>
				</thead>
				<tbody class="order-details-body">
					<?php
							
							$pieces = Order_piece::find_by_id_order($selectedValue);
				
						if($pieces){
							foreach($pieces as $piece){
						?>
						<tr>
							<td><?php echo h($piece->id);?></td>
							<td><?php echo h($piece->name);?></td>
							<td><?php echo h($piece->reference);?></td>
							<td><?php echo h($piece->quantity);?></td>
						</td>       
						</tr>
						<?php
							}
						}
						
					?>
				</tbody>
			</table>

<?php









    
} else {
    echo "No value received.";
}
?>
