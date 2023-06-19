<?php
require_once('./admin/includes/initialize.php');
if(isset($_GET['id'])){
    $id_to_remove = $_GET['id'];
    Piece::delete_from_cart($id_to_remove);
    // You can send a success response back to the JavaScript if needed
     echo json_encode(['success' => true]);
}
?>
