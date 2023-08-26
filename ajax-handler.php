<?php require_once('./admin/includes/initialize.php'); ?>

<?php
if (isset($_POST['selectedValue'])) {
    $selectedValue = $_POST['selectedValue'];
   
?>
	 <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Piece</th>
                    <th scope="col">Name</th>
                    <th scope="col">Reference</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Sale Price</th>
                    <th scope="col">Total</th>
                    <th scope="col">Total with Tax</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $pieces = Order_piece::find_by_id_order($selectedValue);
                $totalSum = 0;
                $totalSalePrice = 0;

                if ($pieces) {
                    foreach ($pieces as $piece) {
                        $pieceTotal = $piece->sale_price * $piece->quantity;
                        $totalSalePrice += $pieceTotal;
                        $pieceTotalWithTax = $pieceTotal * 0.19;
                        $totalSum += $pieceTotalWithTax + $pieceTotal;
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

                <tr>
                    <td colspan="5"><strong>TOTAL</strong></td>
                    <td><strong><?php echo $totalSalePrice . "DA"; ?></strong></td>
                    <td><strong><?php echo $totalSum . "DA"; ?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>

<?php









    
} else {
    echo "No value received.";
}
?>
