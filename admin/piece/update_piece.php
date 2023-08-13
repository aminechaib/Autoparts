<?php 
require_once('../includes/initialize.php');
require_login();

$id = $_GET['id'];
$piece = Piece::find_by_id($id);

if($piece == false)
{
redirect_to('index.php');
};
if(is_post_request() && isset($_POST['modifier'])){
      
    /*
    foreach ($_POST as $key => $value) {            
      $_POST[$key] = test_input($value);
      }
    */

   
  
   
   $args = [];
   $args['id'] = $_GET['id']?? NULL;
   $args['id_name'] = $_POST['id_name'] ?? NULL;
   $args['id_mark'] = $_POST['id_mark'] ?? NULL;
   $args['id_admin'] = 1;
   $args['reference'] = $_POST['reference'] ?? NULL;
   $args['id_categorie'] = $_POST['id_categorie'] ?? NULL;
   $args['purchase_price'] = $_POST['purchase_price'] ?? NULL;
   $args['sale_price'] = $_POST['sale_price'] ?? NULL;
   $args['quantity'] = $_POST['quantity'] ?? NULL;
   $args['photo'] = $_POST['photo'] ?? NULL;
   $piece->merge_attributes($args);
  $result =$piece->update();
  if($result){
    //echo 'jazat la requete';
    session_start();
    $_SESSION['toast'] = true;
    $_SESSION['toastType'] = "une modification";
    redirect_to('index.php');
  }else{
     //echo 'mamchatch';
  }
}
?>