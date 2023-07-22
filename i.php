	<!-- head -->
	<?php include('layouts/head.php'); ?>					
	<!-- end head -->

	<!-- header -->
	<?php include('layouts/header.php'); ?>					
	<!-- end header -->


<?php
if(isset($_POST['sm']) && isset($_POST['total_p']) && isset($_POST['subtotal_p']) && isset($_POST['shipping_p']) ){
  echo "herrrrrrrrrre"."<br>". $_POST['total_p']."<br>". $_POST['subtotal_p']."<br>". $_POST['shipping_p'];
}else{echo"nothing to show"; }

if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
  foreach($_SESSION['cart'] as $id){
    echo "<br>the id is:". $id."and the quantity ->";}}

    if(isset($_SESSION['client'])){
      // var_dump($_SESSION['client']);exit;
      echo "<br>".$_SESSION['client']->first_name;
    }


    if(isset($_POST['sm']) && isset($_POST['quantity'])){
      var_dump($_POST['quantity']);
      }
?>