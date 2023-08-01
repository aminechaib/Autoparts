<?php
session_start();

if (isset($_SESSION['form_inputs']) && is_array($_SESSION['form_inputs'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Display Form Inputs</title>
    </head>
    <body>
        <h2>Submitted Inputs:</h2>
        <table border="1">
            <tr>
                <th>Product Name</th>
                <th>Sale Price</th>
                <th>Quantity</th>
                <th>total</th>
            </tr>
            <?php foreach ($_SESSION['form_inputs'] as $input) { ?>
                <tr>
                    <td><?php echo $input['name']; ?></td>
                    <td><?php echo $input['price']; ?></td>
                    <td><?php echo $input['quantity']; ?></td>
                    <td><?php echo $input['quantity'] * $input['price']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </body>
    </html>
    <?php
} else {
    echo "No inputs found in the session.";
}
?>
