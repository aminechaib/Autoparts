<?php
session_start(); // Start the session if it's not already started

if (isset($_SESSION['form_inputs']) && is_array($_SESSION['form_inputs'])) {
    foreach ($_SESSION['form_inputs'] as $input) {
        $name = $input['name'];
        $sale_price = $input['sale_price'];
        $quantity = $input['quantity'];
        ?>
        <tr class="table-body-row">
            <!-- Display the input values here -->
            <td class="product-name"><?php echo $name; ?></td>
            <td class="product-price"><?php echo $sale_price; ?></td>
            <td><?php echo $quantity; ?></td>
        </tr>
        <?php
    }

    // Optionally, you can clear the stored input values from the session after displaying them:
    unset($_SESSION['form_inputs']);
}
?>
