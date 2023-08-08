<?php 


require_once('../admin/includes/initialize.php');

unset( $_SESSION['client']);
unset( $_SESSION['cart']);

redirect_to('../index.php');

?>